from flask import Flask, render_template, request, send_file, jsonify
import numpy as np
import networkx as nx
import matplotlib.pyplot as plt
import io
from PIL import Image
from flask_cors import CORS
from flask_swagger_ui import get_swaggerui_blueprint

app = Flask(__name__)

# TODO: Habilitar CORS en toda la aplicación
CORS(app)

# TODO: Configurar Swagger UI
SWAGGER_URL = "/api/docs"  # TODO: URL para acceder a Swagger UI
API_URL = "/static/swagger.json"  # TODO: Ruta al archivo Swagger JSON

swaggerui_blueprint = get_swaggerui_blueprint(
    SWAGGER_URL,
    API_URL,
    config={"app_name": "API Robot WebTech-Solutions"},
)

app.register_blueprint(swaggerui_blueprint)

# TODO: Configuración de los parámetros gamma y alfa para el Q-Learning
gamma = 0.75
alpha = 0.9

# TODO: Definición de los estados desde A hasta L con estado desde 0 hasta 11
location_to_state = {
    "A": 0,
    "B": 1,
    "C": 2,
    "D": 3,
    "E": 4,
    "F": 5,
    "G": 6,
    "H": 7,
    "I": 8,
    "J": 9,
    "K": 10,
    "L": 11,
}
state_to_location = {state: location for location, state in location_to_state.items()}

# TODO: Definición de las recompensas de acuerdo al modelo utilizado para el desarrollo de la aplicación
R = np.array(
    [
        [0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0],
        [0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0],
        [0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0],
        [0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0],
        [0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1],
        [0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0],
        [0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1],
        [0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0],
    ]
)


# TODO: Función para calcular la mejor ruta
def route(starting_location, ending_location):
    R_new = np.copy(R)
    ending_state = location_to_state[ending_location]
    R_new[ending_state, ending_state] = 1000
    Q = np.array(np.zeros([12, 12]))
    for i in range(1000):
        current_state = np.random.randint(0, 12)
        playable_actions = []
        for j in range(12):
            if R_new[current_state, j] > 0:
                playable_actions.append(j)
        next_state = np.random.choice(playable_actions)
        TD = (
            R_new[current_state, next_state]
            + gamma * Q[next_state, np.argmax(Q[next_state,])]
            - Q[current_state, next_state]
        )
        Q[current_state, next_state] = Q[current_state, next_state] + alpha * TD
    route = [starting_location]
    next_location = starting_location
    while next_location != ending_location:
        starting_state = location_to_state[starting_location]
        next_state = np.argmax(Q[starting_state,])
        next_location = state_to_location[next_state]
        route.append(next_location)
        starting_location = next_location
    return route


# TODO: Función para crear un gráfico de la ruta
def create_route_graph(route):
    G = nx.DiGraph()

    # TODO: Matriz de ubicación de los nodos de acuerdo a la distribución de la bodega
    pos = {
        "A": (0, 4),
        "B": (2, 4),
        "C": (4, 4),
        "D": (6, 4),
        "E": (0, 2),
        "F": (2, 2),
        "G": (4, 2),
        "H": (6, 2),
        "I": (0, 0),
        "J": (2, 0),
        "K": (4, 0),
        "L": (6, 0),
    }

    for i in range(len(route) - 1):
        G.add_edge(route[i], route[i + 1])

    fig, ax = plt.subplots()

    # TODO: Cargar la imagen de la distribución del almacén para determinar la ruta
    img = Image.open("imagen/image.png")
    ax.imshow(img, extent=[-1, 7, -1, 5])

    nx.draw(
        G,
        pos,
        with_labels=True,
        node_color="skyblue",
        node_size=3000,
        font_size=10,
        font_weight="bold",
        ax=ax,
    )

    # TODO: Etiquetas para la entrada y la ubicación del producto
    ax.text(
        pos[route[0]][0],
        pos[route[0]][1] + 0.3,
        "Entrada",
        horizontalalignment="center",
        fontsize=12,
        color="red",
    )
    ax.text(
        pos[route[-1]][0],
        pos[route[-1]][1] + 0.3,
        "Producto",
        horizontalalignment="center",
        fontsize=12,
        color="green",
    )

    img_buf = io.BytesIO()
    plt.savefig(img_buf, format="png")
    img_buf.seek(0)
    return img_buf


# TODO: API para calcular la mejor ruta y devolverla en formato JSON
@app.route("/api/route", methods=["POST"])
def api_get_route():

    try:
        data = request.json
        if not data:
            return jsonify({"error": "No data provided"}), 400

        start = data.get("start")
        end = data.get("end")

        if not start or not end:
            return jsonify({"error": "Start and end locations are required"}), 400

        best_route = route(start.upper(), end.upper())
        return jsonify(best_route)

    except Exception as e:
        app.logger.error(f"Error generating route: {e}")
        return jsonify({"error": str(e)}), 500


# TODO: API para obtener la imagen de la mejor ruta en formato PNG
@app.route("/api/route_image", methods=["POST"])
def api_get_route_image():

    try:
        data = request.json

        if not data:
            return jsonify({"error": "No data provided"}), 400

        start = data.get("start")
        end = data.get("end")

        if not start or not end:
            return jsonify({"error": "Start and end locations are required"}), 400

        best_route = route(start.upper(), end.upper())
        img_buf = create_route_graph(best_route)
        return send_file(img_buf, mimetype="image/png")

    except Exception as e:
        app.logger.error(f"Error generating image: {e}")
        return jsonify({"error": str(e)}), 500


# TODO: Permitir la ejecución de la aplicacion desde cualquier IP con el puerto 5000
if __name__ == "__main__":
    app.run(host="0.0.0.0", port="5000", debug=True)
