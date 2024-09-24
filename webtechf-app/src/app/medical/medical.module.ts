import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MedicalRoutingModule } from './medical-routing.module';
import { MedicalComponent } from './medical.component';
import { SharedModule } from '../shared/shared.module';
import { PersonasComponent } from './personas/personas.component';
// import { MatSelectModule } from '@angular/material/select';
// import { MatOptionModule } from '@angular/material/core';
// import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    MedicalComponent,
    PersonasComponent,
  ],
  imports: [
    CommonModule,
    // CoreRoutingModule,
    MedicalRoutingModule,
    SharedModule,
    // MatSelectModule,
    // MatOptionModule,
    // FormsModule,
  ]
})
export class MedicalModule { }
