/* eslint-disable no-var */
/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable @typescript-eslint/no-unused-vars */
import { Component, OnInit } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { routes } from 'src/app/shared/routes/routes';
import { ProveedorService } from '../../proveedores/service/proveedor.service';
import { apiResultProveedor, Proveedor } from 'src/app/shared/interfaces/proveedor.interface';
import { CategoriaService } from '../../categoria/service/categoria.service';
import { datacategoria } from 'src/app/shared/interfaces/categoria.interface';
import { apiResultSubcategoria, Subcategoria } from 'src/app/shared/interfaces/subcategoria';
import { SubcategoriaService } from '../../subcategoria/service/subcategoria.service';
import { apiResultProducto, dataProducto } from '../interfaces/producto.interface';
import { ProductosService } from '../service/productos.service';
import { DataCompra } from 'src/app/shared/interfaces/compra.interface';
import { EntradaProductoService } from '../service/entrada-producto.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-entrada-productos',
  templateUrl: './entrada-productos.component.html',
  styleUrls: ['./entrada-productos.component.scss']
})
export class EntradaProductosComponent implements OnInit {
  public routes = routes;
  public checkboxes: string[] = [];
  public itemDetails: number[] = [0];
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  public itemDetailss: Array<any> = [];
  public chargesArray: number[] = [0];
  public recurringInvoice = false;
  public selectedValue!: string;
  date = new FormControl(new Date());
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  invoicedetail !: FormArray<any>;
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  listaentrada: apiResultProveedor;

  public dataproveedor: Array<Proveedor> = [];
  public datacategoria: Array<datacategoria> = [];
  public datasubcategoria: Array<Subcategoria> = [];
  public dataproducto: Array<dataProducto> = [];

  frm_venta!: FormGroup;
  constructor(
    private fb: FormBuilder,
    public servicioProveedor: ProveedorService,
    public servicioCategoria: CategoriaService,
    public servicioSubcategoria: SubcategoriaService,
    public servicioProducto: ProductosService,
    public serviceEntrada: EntradaProductoService,
    private navegacion: Router,
  ) {
    this.frm_venta = this.fb.group({
      proveedor: this.fb.control('', Validators.required),
      categoria: this.fb.control('', Validators.required),
      subcategoria: this.fb.control('', Validators.required),
      producto: this.fb.control('', Validators.required),
      total: this.fb.control({ value: 0, disabled: true }),
      tax: this.fb.control({ value: 0, disabled: true }),
      netTotal: this.fb.control({ value: 0, disabled: true }),
      details: this.fb.array([
      ])
    });
  }

  ngOnInit(): void {
    this.dataProveedorAll();
    this.cargaSelectAll();
    this.summarycalculation();
    


  }

  cargaSelectAll() {
    this.servicioProveedor.getProvedorMat().subscribe((data) => (this.dataproveedor = data['data']));
    this.servicioCategoria.getCategoriasMat().subscribe((data) => (this.datacategoria = data['data']));
  }

  changesubcat(value) {
    this.GetSubCategoriaId(value);
  }

  GetSubCategoriaId(id: number) {
    this.servicioSubcategoria.getsubcategoriasByCategoriaId(id).subscribe((data: apiResultSubcategoria) => {
      this.datasubcategoria = data.data;
    });
  }

  changeproducto(value) {
    this.GetSubProductoId(value);
  }

  GetSubProductoId(id: number) {
    this.servicioProducto.productosBySubCategoria(id).subscribe((data: apiResultProducto) => {
      this.dataproducto = data.data;
    });
  }

  dataProveedorAll() {
    this.servicioProveedor.getProvedorMat().subscribe((data) => { this.dataproveedor = data['data']; });
  }

  get invproducts() {
    return this.frm_venta.get("details") as FormArray;
  }

  Generaterow() {
    const selectedProductId = this.frm_venta.get('producto')?.value;
    const selectedProduct = this.dataproducto.find(product => product.pro_id === selectedProductId);

    return this.fb.group({
      nombreproducto: this.fb.control({ value: selectedProduct.pro_detalle, disabled: true }),
      costounitario: this.fb.control(''),
      cantidad: this.fb.control('', Validators.required),
      total: this.fb.control({ value: 0, disabled: true }),
      pro_id: this.fb.control({ value: selectedProduct.pro_id, disabled: true }),
    });
  }

  addcompra() { this.addItem(); }

  addItem() {
    this.invoicedetail = this.frm_venta.get("details") as FormArray;
    // console.log(JSON.stringify(this.invoicedetail.value, null, 4));
    for (let i = this.invoicedetail.length - 1; i >= 0; i--) {
      const group = this.invoicedetail.at(i) as FormGroup;
      if (!group.value.costounitario && !group.value.cantidad) {
        this.invoicedetail.removeAt(i);
      }
    }   
    this.invoicedetail.push(this.Generaterow());
    this.summarycalculation();
  }
  
  deleteItem(index: number) {
    this.invoicedetail.removeAt(index);
    this.summarycalculation();
  }

  // deleteItem(index: number) {
  //   this.itemDetails.splice(index, 1)
  // }

  addCharges() {
    this.chargesArray.push(1)
  }

  deleteCharges(index: number) {
    this.chargesArray.splice(index, 1)
  }

  recurringInvoiceFunc() {
    this.recurringInvoice = !this.recurringInvoice
  }

  public openCheckBoxes(val: string) {
    if (this.checkboxes[0] != val) {
      this.checkboxes[0] = val;
    } else {
      this.checkboxes = [];
    }
  }

  Itemcalculation(index: any) {
    const group = this.invoicedetail.at(index) as FormGroup;
    const qty = group.get("costounitario")?.value;
    const price = group.get("cantidad")?.value;
    const total = qty * price;
    group.get("total")?.setValue(total);
    this.summarycalculation();
  }

  onSubmit() {

    var date = new Date();

    const data = {
      ent_num_docu: 'FC000-008083',
      ent_fecha: date.toJSON().slice(0, 10),
      ent_monto: this.frm_venta.get('netTotal')?.value,
      prve_id: this.frm_venta.get('proveedor')?.value,
      detalle: this.invproducts.controls.map((control: FormGroup) => ({
      nombreproducto: control.get('nombreproducto')?.value,
      dte_costo_unitario: control.get('costounitario')?.value,
      dte_cantidad: control.get('cantidad')?.value,
      pro_id: control.get('pro_id')?.value,
      total: control.get('total')?.value
      }))
    };

    console.log(data);

    this.serviceEntrada.createEntrada(data).subscribe((data) => {
      console.log('creado con exito');
      this.navegacion.navigate(['productos/lista-compras']);
      console.log(data);
    });
  }

  

  summarycalculation() {
    const array = this.frm_venta.getRawValue().details;
    let sumtotal = 0;
    array.forEach((x: any) => {
      sumtotal = sumtotal + x.total;
    });

    // iva calculo
    const sumtax = (15 / 100) * sumtotal;
    const nettotal = sumtotal + sumtax;

    this.frm_venta.get("total")?.setValue(sumtotal.toFixed(2));
    this.frm_venta.get("tax")?.setValue(sumtax.toFixed(2));
    this.frm_venta.get("netTotal")?.setValue(nettotal.toFixed(2));
  }

}
