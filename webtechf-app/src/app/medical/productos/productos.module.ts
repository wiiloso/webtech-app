import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProductosRoutingModule } from './productos-routing.module';
import { ListaProductosComponent } from './lista-productos/lista-productos.component';
import { ProductosComponent } from './productos.component'; // Add this line

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ExpensesRoutingModule } from 'src/app/core/accounts/expenses/expenses-routing.module';
import { MatOptionModule } from '@angular/material/core';
import { MatSelectModule } from '@angular/material/select';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatSortModule } from '@angular/material/sort';
import {MatPaginatorModule} from '@angular/material/paginator'; 
import { MatTableModule } from '@angular/material/table';
import { EntradaProductosComponent } from './entrada-productos/entrada-productos.component';
import { SalidaProductosComponent } from './salida-productos/salida-productos.component';
import { KardexComponent } from './kardex/kardex.component';
import { ListaComprasComponent } from './lista-compras/lista-compras.component';


@NgModule({
  declarations: [
    ProductosComponent,
    ListaProductosComponent,
    EntradaProductosComponent,
    SalidaProductosComponent,
    KardexComponent,
    ListaComprasComponent,
  ],
  imports: [
    CommonModule,
    ProductosRoutingModule,
    FormsModule,
    ExpensesRoutingModule,
    MatOptionModule,
    MatDatepickerModule,
    MatSelectModule,
    MatSortModule,
    MatPaginatorModule,
    MatTableModule,
    MatPaginatorModule,
    ReactiveFormsModule
  ]
})
export class ProductosModule { }
