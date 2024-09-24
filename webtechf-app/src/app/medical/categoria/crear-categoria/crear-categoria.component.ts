/* eslint-disable @typescript-eslint/no-unused-vars */
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { datacategoria } from 'src/app/shared/interfaces/categoria.interface';
import { routes } from 'src/app/shared/routes/routes';
import { CategoriaService } from '../service/categoria.service';
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-crear-categoria',
  templateUrl: './crear-categoria.component.html',
  styleUrls: ['./crear-categoria.component.scss']
})
export class CrearCategoriaComponent implements OnInit {

  public routes = routes;
  form!: FormGroup;
  submitted = false;
  cat_id? = 0;


  constructor(
    private formBuilder: FormBuilder, 
    public dataservice: CategoriaService,
    private navegacion: Router,
  ) {  }

  ngOnInit(): void {
    this.validatorFormGroup();
  }

  validatorFormGroup() {
    this.form = this.formBuilder.group({
      cat_nombre: new FormControl('', Validators.required) 
    });
  }

  onSubmit() {
    const datacategorias: datacategoria = {
      cat_nombre: this.form.value.cat_nombre,
      cat_cod: 'cat',
      cat_estado: 1
    }
    this.crearCategoria(datacategorias);
  }

  crearCategoria(datacategorias) {
    this.dataservice.createCategoria(datacategorias).subscribe((data) => {
      Swal.fire({
        position: "top-right",
        icon: "success",
        title: "Creado con éxito",
        showConfirmButton: false,
        timer: 1500
      });
    });
  }
}
