import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProveedoresRoutingModule } from './proveedores-routing.module';
import { ProveedoresComponent } from './proveedores.component';
import { ListaProveedoresComponent } from './lista-proveedores/lista-proveedores.component';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ExpensesRoutingModule } from 'src/app/core/accounts/expenses/expenses-routing.module';
import { MatOptionModule } from '@angular/material/core';
import { MatSelectModule } from '@angular/material/select';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatSortModule } from '@angular/material/sort';
import { EditarProveedorComponent } from './editar-proveedor/editar-proveedor.component';
import { CrearProveedorComponent } from './crear-proveedor/crear-proveedor.component';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatTableModule } from '@angular/material/table';

@NgModule({
  declarations: [ProveedoresComponent, ListaProveedoresComponent, EditarProveedorComponent, CrearProveedorComponent],
  imports: [
    CommonModule,
    ProveedoresRoutingModule,
    FormsModule,
    ExpensesRoutingModule,
    MatOptionModule,
    MatDatepickerModule,
    MatSelectModule,
    MatSortModule,
    MatPaginatorModule,
    MatTableModule,
    ReactiveFormsModule
  ],
})
export class ProveedoresModule {}
