import { map } from 'rxjs';
/* eslint-disable @typescript-eslint/no-explicit-any */
import { Component, OnInit } from '@angular/core';
import { routes } from 'src/app/shared/routes/routes';
import { DomSanitizer } from '@angular/platform-browser';
import { RutaService } from '../service/ruta.service';
import { ProductosService } from '../../productos/service/productos.service';
import { FormControl, FormGroup } from '@angular/forms';

interface data {
  value: string;
}

@Component({
  selector: 'app-ruta-robot',
  templateUrl: './ruta-robot.component.html',
  styleUrls: ['./ruta-robot.component.scss'],
})
export class RutaRobotComponent implements OnInit {
  public routes = routes;
  imageUrl: string | undefined;
  thumbnail: any;
  entrada: string;
  destino: string;

  constructor(
    public dataservice: RutaService,
    private sanitizer: DomSanitizer,
    private ServicioProductos: ProductosService
  ) {}

  listaProductos: any[] = [];
  ngOnInit(): void {
    this.cargaImagen();
    this.ServicioProductos.getProductosMat().subscribe((data) => {
      this.listaProductos = data.data;
    });
  }

  mejorRuta() {
    console.log('aqui los datos de la ruta');

    const ruta = {
      start: this.entrada,
      end: this.destino,
    };
    this.dataservice.getImage(ruta).subscribe((blob) => {
      const objectURL = URL.createObjectURL(blob);
      this.thumbnail = this.sanitizer.bypassSecurityTrustUrl(objectURL);
    });

    console.log(ruta);
  }
  cargaImagen() {
    const data = {
      start: 'A',
      end: 'D',
    };
    this.dataservice.getImage(data).subscribe((blob) => {
      const objectURL = URL.createObjectURL(blob);
      this.thumbnail = this.sanitizer.bypassSecurityTrustUrl(objectURL);
    });
  }

  public selectedValue!: string;
  selectedList1: data[] = [
    { value: 'Entrada 1' },
    { value: 'Entrada 2' },
    { value: 'Entrada 3' },
  ];
  selectedList2: data[] = [
    { value: 'cable router' },
    { value: 'Pending' },
    { value: 'Approved' },
    { value: 'Declined' },
  ];
}
