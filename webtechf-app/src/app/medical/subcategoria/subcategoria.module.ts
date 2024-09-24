import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SubcategoriaRoutingModule } from './subcategoria-routing.module';
import { SubcategoriaComponent } from './subcategoria.component';
import { ListaSubcategoriaComponent } from './lista-subcategoria/lista-subcategoria.component';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ExpensesRoutingModule } from 'src/app/core/accounts/expenses/expenses-routing.module';
import { MatOptionModule } from '@angular/material/core';
import { MatSelectModule } from '@angular/material/select';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatSortModule } from '@angular/material/sort';
import { CrearSubcategoriaComponent } from './crear-subcategoria/crear-subcategoria.component';
import { EditarSubcategoriaComponent } from './editar-subcategoria/editar-subcategoria.component';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatTableModule } from '@angular/material/table';

@NgModule({
  declarations: [
    SubcategoriaComponent,
    ListaSubcategoriaComponent,
    CrearSubcategoriaComponent,
    EditarSubcategoriaComponent
  ],
  imports: [
    CommonModule,
    SubcategoriaRoutingModule,
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
export class SubcategoriaModule { }
