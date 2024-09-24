import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { RutaRoutingModule } from './ruta-routing.module';
import { RutaComponent } from './ruta.component';
import { RutaRobotComponent } from './ruta-robot/ruta-robot.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ExpensesRoutingModule } from 'src/app/core/accounts/expenses/expenses-routing.module';
import { MatOptionModule } from '@angular/material/core';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatSelectModule } from '@angular/material/select';
import { MatSortModule } from '@angular/material/sort';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatTableModule } from '@angular/material/table';


@NgModule({
  declarations: [
    RutaComponent,
    RutaRobotComponent
  ],
  imports: [
    CommonModule,
    RutaRoutingModule,
    FormsModule,
    ExpensesRoutingModule,
    MatOptionModule,
    MatDatepickerModule,
    MatSelectModule,
    MatSortModule,
    MatPaginatorModule,
    MatTableModule,
    ReactiveFormsModule
  ]
})
export class RutaModule { }
