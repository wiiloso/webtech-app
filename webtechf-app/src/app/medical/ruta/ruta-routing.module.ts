import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RutaComponent } from './ruta.component';
import { RutaRobotComponent } from './ruta-robot/ruta-robot.component';

const routes: Routes = [
  {
    path: '',
    component: RutaComponent,
    children: [
      {
        path: 'rutas-robot',
        component: RutaRobotComponent,
      }
    ],
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class RutaRoutingModule { }
