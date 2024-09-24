/* eslint-disable @typescript-eslint/no-explicit-any */
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment.development';
import { catchError, map } from 'rxjs';
import {
  apiResultFormato,
  apiResultProducto,
  Producto,
} from '../interfaces/producto.interface';
import {
  apiResultPersona,
  Persona,
  apiResultFormatoJson,
} from '../../personas/interfaces/persona.interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ProductosService {
  //  prod: Producto  = { } as Producto;
  private apiURL = environment.URL_API;
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
    }),
  };

  constructor(private httpClient: HttpClient) {}

  getProductos = (): Observable<string | Producto> => {
    return this.httpClient
      .get<string | Producto>(`${this.apiURL}productos/getall`)
      .pipe(catchError(this.errorHandler));
  };

  public getProductosMat(): Observable<apiResultFormato> {
    return this.httpClient
      .get<apiResultFormato>(`${this.apiURL}productos/getall`)
      .pipe(
        map((res: apiResultFormato) => {
          return res;
        })
      );
  }

  buscarProducto(buscar_texto: string): Observable<apiResultFormato> {
    console.log(buscar_texto);
    return this.httpClient.get<apiResultFormato>(
      this.apiURL + `productos/getProducto/${buscar_texto}`
    );
  }

  buscarCliente(busca_cedula: string): Observable<apiResultFormatoJson> {
    return this.httpClient.get<apiResultFormatoJson>(
      this.apiURL + `personas/getPersona/${busca_cedula}`
    );
  }

  getProductoId(id: number): Observable<string | Producto> {
    return this.httpClient
      .get<string | Producto>(`${this.apiURL}productos/getdata/${id}`)
      .pipe(catchError(this.errorHandler));
  }

  getById(id: number): Observable<Producto> {
    console.log(id);
    const fromData = new FormData();
    fromData.append('id', id.toString());
    return this.httpClient.post<Producto>(
      `${this.apiURL}productos/getdata/${id}`,
      fromData
    );
  }

  productosBySubCategoria(id: number): Observable<string | apiResultProducto> {
    return this.httpClient
      .get<string | apiResultProducto>(
        `${this.apiURL}productos/statedatacat/${id}`
      )
      .pipe(catchError(this.errorHandler));
  }

  errorHandler(error) {
    let errorMessage = '';
    if (error.error instanceof ErrorEvent) {
      errorMessage = error.error.message;
    } else {
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    return errorMessage;
  }
}
