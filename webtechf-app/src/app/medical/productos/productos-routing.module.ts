import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ProductosComponent } from './productos.component';
import { ListaProductosComponent } from './lista-productos/lista-productos.component';
import { EntradaProductosComponent } from './entrada-productos/entrada-productos.component';
import { SalidaProductosComponent } from './salida-productos/salida-productos.component';
import { KardexComponent } from './kardex/kardex.component';
import { ListaComprasComponent } from './lista-compras/lista-compras.component';

const routes: Routes = [
  {
    path: '',
    component: ProductosComponent,
    children: [
      {
        path: 'ListaProductos',
        component: ListaProductosComponent,
      },
      {
        path: 'entrada-productos',
        component: EntradaProductosComponent,
      },
      {
        path: 'salida-productos',
        component: SalidaProductosComponent,
      },
      {
        path: 'kardex',
        component: KardexComponent,
      },
      {
        path: 'lista-compras',
        component: ListaComprasComponent
      }      
    ],
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProductosRoutingModule { }
