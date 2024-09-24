import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { RolesRoutingModule } from './roles-routing.module';
import { RolesComponent } from './roles.component';
import { AddRoleUserComponent } from './add-role-user/add-role-user.component';
import { EditRoleUserComponent } from './edit-role-user/edit-role-user.component';
import { ListRoleUserComponent } from './list-role-user/list-role-user.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { MatSortModule } from '@angular/material/sort';
import { ExpensesRoutingModule } from 'src/app/core/accounts/expenses/expenses-routing.module';
import { MatOptionModule } from '@angular/material/core';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatSelectModule } from '@angular/material/select';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatTableModule } from '@angular/material/table';
// import { RouterModule } from '@angular/router';


@NgModule({
  declarations: [
    RolesComponent,
    AddRoleUserComponent,
    EditRoleUserComponent,
    ListRoleUserComponent
  ],
  imports: [
    CommonModule,
    RolesRoutingModule,
    FormsModule,
    HttpClientModule,
    ReactiveFormsModule,
    ExpensesRoutingModule,
    RouterModule,
    MatOptionModule,
    MatDatepickerModule,
    MatSelectModule,
    MatSortModule,
    MatPaginatorModule,
    MatTableModule,
  ]
})
export class RolesModule { }
