import { Producto } from './../interfaces/producto.interface';
import { Component, OnInit } from '@angular/core';
import { routes } from 'src/app/shared/routes/routes';
import { ProductosService } from '../service/productos.service';
import { PersonaService } from '../../personas/service/persona.service';
import { Persona } from '../../personas/interfaces/persona.interface';
import { FormControl, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-salida-productos',
  templateUrl: './salida-productos.component.html',
  styleUrls: ['./salida-productos.component.scss'],
})
export class SalidaProductosComponent {
  public routes = routes;
  frm_salida: FormGroup;
  totalapagar: number = 0;
  sub_total_pagar: number = 0;
  sub_total_iva: number = 0;
  valor_iva: number = 0;
  iva: number = 0.15;
  productoelejido: any[] = [];
  busqueda;
  busca_cliente;
  cantidad: number;
  per_id: number;
  nombres: string;
  direccion: string;
  cedula: string;
  telefono: string;
  listaProductos: Producto[] = [];
  producto: Producto[] = [];
  mostrarProducto: boolean;
  listarPersona: Persona[] = [];
  mostrarPersona: boolean;

  constructor(
    private ServicioProducto: ProductosService,
    private ServicioPersona: PersonaService
  ) {}

  OnInit() {
    this.mostrarProducto = false;
    this.mostrarPersona = false;

    this.frm_salida = new FormGroup({
      per_id: new FormControl(''),
      subtotal: new FormControl(''),
      total: new FormControl(''),
      iva: new FormControl(''),
      fecha: new FormControl(''),
    });
  }

  buscarProducto() {
    const buscar_texto = this.busqueda;

    this.ServicioProducto.buscarProducto(buscar_texto).subscribe((producto) => {
      if (producto.data.length > 0) {
        this.listaProductos = producto.data;
        this.mostrarProducto = true;
      } else {
        this.listaProductos = null;
        console.log('No se encontro el producto');
      }
    });
  }

  buscarCliente() {
    const busca_cedula = this.busca_cliente;
    this.ServicioPersona.buscarCliente(busca_cedula).subscribe((cliente) => {
      if (cliente.data.length > 0) {
        this.listarPersona = cliente.data;
        this.mostrarPersona = true;
        this.busca_cliente = '';
        this.per_id = cliente.data[0].per_id;
        this.nombres =
          cliente.data[0].per_nombres + ' ' + cliente.data[0].per_apellidos;
        this.direccion = cliente.data[0].per_direccion;
        this.cedula = cliente.data[0].per_cedula;
        this.telefono = cliente.data[0].per_telefono;
      } else {
        this.listarPersona = null;
        console.log('No se encontro el cliente');
      }
    });
  }

  agregarProducto(producto: any, cantidad: number) {
    if (cantidad <= 0 || cantidad.toString() == '') {
      alert('Por favor, ingrese una cantidad válida.');
    }

    const productoConCantidad = {
      ...producto,
      cantidad: cantidad,
      Total: cantidad * producto.pro_costo_unitario,
    };

    this.productoelejido.push(productoConCantidad);
    this.calculos();
    this.busqueda = '';
    this.cantidad = 0;
    this.mostrarProducto = false;
  }

  eliminarProducto(producto: any) {
    this.productoelejido = this.productoelejido.filter(
      (p) => p.pro_nombre_producto !== producto.pro_nombre_producto
    );
    this.calculos();
  }

  calculos() {
    let subtotal = 0;
    this.productoelejido.forEach((producto) => {
      subtotal += producto.Total;
    });

    const iva = subtotal * 0.15;
    const totalapagar = subtotal + iva;
    totalapagar.toFixed(2);
    iva.toFixed(2);

    this.sub_total_pagar = subtotal;
    this.sub_total_iva = iva;
    this.totalapagar = totalapagar;
  }

  grabar() {
    console.log('Grabando...');

    let datos = {
      per_id: this.per_id,
      nombres: this.nombres,
      direccion: this.direccion,
      cedula: this.cedula,
      telefono: this.telefono,
      subtotal: this.sub_total_pagar,
      total: this.totalapagar,
      iva: this.sub_total_iva,
      salida: this.productoelejido,
    };

    console.log(datos);

    // const doc = new jsPDF('p', 'mm', 'A4');

  }
}
