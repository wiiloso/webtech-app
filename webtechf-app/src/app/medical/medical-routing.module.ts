import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MedicalComponent } from './medical.component';
import { AuthGuard } from '../shared/gaurd/auth.guard';

// const routes: Routes = [
//   {
//     path: '',
//     component: MedicalComponent,
//     canActivate: [AuthGuard],
//     children: [
//       {
//         path: 'roles',
//         loadChildren: () =>
//           import('./roles/roles.module').then((m) => m.RolesModule),
//       },
//     ],
//   }
// ];

const routes: Routes = [
  {
    path: '',
    component: MedicalComponent,
    canActivate: [AuthGuard],
    children: [  
      {
        path: 'roles',
        loadChildren: () =>
          import('./roles/roles.module').then((m) => m.RolesModule),
      },
    ],
  },
  {
    path: '',
    component: MedicalComponent,
    canActivate: [AuthGuard],
    children: [  
      {
        path: 'productos',
        loadChildren: () =>
          import('./productos/productos.module').then((m) => m.ProductosModule),
      },
    ],
  },
  {
    path: '',
    component: MedicalComponent,
    canActivate: [AuthGuard],
    children: [  
      {
        path: 'proveedores',
        loadChildren: () =>
          import('./proveedores/proveedores.module').then((m) => m.ProveedoresModule),
      },
    ],
  },
  {
    path: '',
    component: MedicalComponent,
    canActivate: [AuthGuard],
    children: [  
      {
        path: 'categoria',
        loadChildren: () =>
          import('./categoria/categoria.module').then((m) => m.CategoriaModule),
      },
    ],
  },
  {
    path: '',
    component: MedicalComponent,
    canActivate: [AuthGuard],
    children: [  
      {
        path: 'subcategoria',
        loadChildren: () =>
          import('./subcategoria/subcategoria.module').then((m) => m.SubcategoriaModule),
      },
    ],
  },
  {
    path: '',
    component: MedicalComponent,
    canActivate: [AuthGuard],
    children: [  
      {
        path: 'ruta',
        loadChildren: () =>
          import('./ruta/ruta.module').then((m) => m.RutaModule),
      },
    ],
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MedicalRoutingModule { }
