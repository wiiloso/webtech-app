import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CategoriaRoutingModule } from './categoria-routing.module';
import { CategoriaComponent } from './categoria.component';
import { ListaCategoriaComponent } from './lista-categoria/lista-categoria.component';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ExpensesRoutingModule } from 'src/app/core/accounts/expenses/expenses-routing.module';
import { MatOptionModule } from '@angular/material/core';
import { MatSelectModule } from '@angular/material/select';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatSortModule } from '@angular/material/sort';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatTableModule } from '@angular/material/table';
import { CrearCategoriaComponent } from './crear-categoria/crear-categoria.component';
import { EditarCategoriaComponent } from './editar-categoria/editar-categoria.component';

@NgModule({
  declarations: [CategoriaComponent, CrearCategoriaComponent, ListaCategoriaComponent, EditarCategoriaComponent],
  imports: [
    CommonModule,
    CategoriaRoutingModule,
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
  ],
})
export class CategoriaModule {}
