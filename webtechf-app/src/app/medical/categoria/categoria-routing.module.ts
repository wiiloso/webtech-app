import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CategoriaComponent } from './categoria.component';
import { ListaCategoriaComponent } from './lista-categoria/lista-categoria.component';
import { CrearCategoriaComponent } from './crear-categoria/crear-categoria.component';
import { EditarCategoriaComponent } from './editar-categoria/editar-categoria.component';

const routes: Routes = [
  {
    path: '',
    component: CategoriaComponent,
    children: [
      {
        path: 'ListaCategoria',
        component: ListaCategoriaComponent,
      },
      {
        path: 'CrearCategoria',
        component: CrearCategoriaComponent
      },
      {
        path: 'EditarCategoria',
        component: EditarCategoriaComponent
      }
    ],
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CategoriaRoutingModule { }
