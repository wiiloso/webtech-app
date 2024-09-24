/* eslint-disable @typescript-eslint/no-explicit-any */
import { Component, OnInit } from '@angular/core';
import { ProveedorService } from '../service/proveedor.service';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-editar-proveedor',
  templateUrl: './editar-proveedor.component.html',
  styleUrls: ['./editar-proveedor.component.scss']
})
export class EditarProveedorComponent implements OnInit {

  constructor(
    public dataservice: ProveedorService,
    private sanitizer: DomSanitizer
  ) { }

  imageUrl: string | undefined;
  thumbnail: any;

  ngOnInit(): void {
    const data = {
      start: 'A',
      end: 'B'
    }

    this.dataservice.getImage(data)
      .subscribe(blob => {
        const objectURL = URL.createObjectURL(blob);
        this.thumbnail  = this.sanitizer.bypassSecurityTrustUrl(objectURL);
      });
  }
}
