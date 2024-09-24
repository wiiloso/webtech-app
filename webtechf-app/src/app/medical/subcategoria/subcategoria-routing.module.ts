import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { SubcategoriaComponent } from './subcategoria.component';
import { ListaSubcategoriaComponent } from './lista-subcategoria/lista-subcategoria.component';
import { EditarSubcategoriaComponent } from './editar-subcategoria/editar-subcategoria.component';
import { CrearSubcategoriaComponent } from './crear-subcategoria/crear-subcategoria.component';

const routes: Routes = [
  {
    path: '',
    component: SubcategoriaComponent,
    children: [
      {
        path: 'ListaSubcategoria',
        component: ListaSubcategoriaComponent,
      },
      {
        path: 'CrearSubcategoria',
        component: CrearSubcategoriaComponent
      },
      {
        path: 'Editar-Subcategoria',
        component: EditarSubcategoriaComponent
      }
    ],
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SubcategoriaRoutingModule { }
