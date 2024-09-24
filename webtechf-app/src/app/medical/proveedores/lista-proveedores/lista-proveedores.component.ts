/* eslint-disable @typescript-eslint/no-unused-vars */
import { Component, OnInit, ViewChild } from '@angular/core';
import { MatSort, Sort } from '@angular/material/sort';
import { MatTableDataSource } from '@angular/material/table';
import { DataService } from 'src/app/shared/data/data.service';
import { Categoria, datacategoria } from 'src/app/shared/interfaces/categoria.interface';
import { pageSelection, apiResultFormat, expenses } from 'src/app/shared/models/models';
import { routes } from 'src/app/shared/routes/routes';
import { CategoriaService } from '../../categoria/service/categoria.service';
import { ActivatedRoute } from '@angular/router';
import { MatPaginator } from '@angular/material/paginator';
import Swal from 'sweetalert2';
import { ProveedorService } from '../service/proveedor.service';
import { apiResultProveedor, apiResultProveedores, Proveedor } from 'src/app/shared/interfaces/proveedor.interface';

interface data {
  value: string ;
}

@Component({
  selector: 'app-lista-proveedores',
  templateUrl: './lista-proveedores.component.html',
  styleUrls: ['./lista-proveedores.component.scss']
})
export class ListaProveedoresComponent implements OnInit {

  public routes = routes;

  public selectedValue !: string;
  public expenses: Array<expenses> = [];
  dataSource!: MatTableDataSource<expenses>;

  public showFilter = false;
  public searchDataValue = '';
  public lastIndex = 0;
  public pageSize = 10;
  public totalData = 0;
  public skip = 0;
  public limit: number = this.pageSize;
  public pageIndex = 0;
  public serialNumberArray: Array<number> = [];
  public currentPage = 1;
  public pageNumberArray: Array<number> = [];
  public pageSelection: Array<pageSelection> = [];
  public totalPages = 0;
  event: Sort;
  public categorias: Categoria[] = [];
  public datacategoria: Array<datacategoria> = [];
  dataSourceCat!: MatTableDataSource<datacategoria>;
  displayedColumns: string[] = ['index', 'Nombre Categoria', 'Codigo Categoria', 'Acciones'];
  @ViewChild(MatPaginator, { static: true }) paginator!: MatPaginator;
  @ViewChild(MatSort, { static: true }) sort!: MatSort;



  public proveedores: apiResultProveedores[] = [];
  public dataproveedores: Array<Proveedor> = [];
  dataSourceProveedores!: MatTableDataSource<Proveedor>;
  // "prve_id": 1,
  // "prve_nombre": "TRANSCADE",
  // "prve_direccion": "Ov. Las 62",
  // "prve_telefono": "947596133",
  // "prve_email": "info@transcaden.com",
  // "prve_estado": 1
  displayedColumnsProveedores: string[] = ['index', 'Nombre Proveedor', 'Direccion', 'Telefono', 'Email', 'Acciones'];

  
  constructor(
    public data: DataService,
    public dataservice: CategoriaService,
    public route: ActivatedRoute,
    public proveedorService: ProveedorService
  ) {}
  ngOnInit() {
    this.getTableData();
    this.GetCategorias();
    this.GetProveedores();
  }
  
  GetProveedores() {
    this.proveedorService.getProvedorMate().subscribe((datos: string | apiResultProveedores) => {
      this.proveedores = datos as unknown as apiResultProveedores[];
      this.dataproveedores = datos['data'];
      this.dataSourceProveedores = new MatTableDataSource<Proveedor>(this.dataproveedores);
      this.dataSourceProveedores.paginator = this.paginator;
      this.dataSourceProveedores.sort = this.sort;
    });
  }

  GetCategorias() {
    this.dataservice.getCategorias().subscribe((datos: string | Categoria) => {
      this.categorias = datos as unknown as Categoria[];
      this.datacategoria = datos['data'];
      console.log(this.datacategoria);
      this.dataSourceCat = new MatTableDataSource<datacategoria>(this.datacategoria);
      this.dataSourceCat.paginator = this.paginator;
      this.dataSourceCat.sort = this.sort;
    });
  }

  applyFilter(event) {
    const filterValue = event.target.value.trim().toLowerCase();
    this.dataSourceProveedores.filter = filterValue;
  }

  deleteCategoria(cat_id) {
    Swal.fire({
      title: "Esta Seguro de borrar el registro?",
      text: "",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Borrar la Categoria!"
    }).then((result) => {
      if (result.isConfirmed) {
        if (result.value) {
          this.dataservice.deleteCategoria(cat_id).subscribe((data) => {
            this.GetCategorias();
          });
          Swal.fire({
            title: "Borrado!",
            text: "Tu registro a sido Eliminado.",
            icon: "success"
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire(
            'Cancelado',
            'No se pudo Eliminar el Registro :)',
            'error'
          )
        }
      }
    });
  }


  // ====================================================================================================================
  private getTableData(): void {
    this.expenses = [];
    this.serialNumberArray = [];

    this.data.getExpenses().subscribe((data: apiResultFormat) => {
      this.totalData = data.totalData;
      data.data.map((res: expenses, index: number) => {
        const serialNumber = index + 1;
        if (index >= this.skip && serialNumber <= this.limit) {

          this.expenses.push(res);
          this.serialNumberArray.push(serialNumber);
        }
      });
      this.dataSource = new MatTableDataSource<expenses>(this.expenses);
      this.calculateTotalPages(this.totalData, this.pageSize);
    });
  }
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  public searchData(value: any): void {
    this.dataSource.filter = value.trim().toLowerCase();
    this.expenses = this.dataSource.filteredData;
  }

  public sortData(sort: Sort) {
    const data = this.expenses.slice();

    if (!sort.active || sort.direction === '') {
      this.expenses = data;
    } else {
      this.expenses = data.sort((a, b) => {
        // eslint-disable-next-line @typescript-eslint/no-explicit-any
        const aValue = (a as any)[sort.active];
        // eslint-disable-next-line @typescript-eslint/no-explicit-any
        const bValue = (b as any)[sort.active];
        return (aValue < bValue ? -1 : 1) * (sort.direction === 'asc' ? 1 : -1);
      });
    }
  }

  public getMoreData(event: string): void {
    if (event == 'next') {
      this.currentPage++;
      this.pageIndex = this.currentPage - 1;
      this.limit += this.pageSize;
      this.skip = this.pageSize * this.pageIndex;
      this.getTableData();
    } else if (event == 'previous') {
      this.currentPage--;
      this.pageIndex = this.currentPage - 1;
      this.limit -= this.pageSize;
      this.skip = this.pageSize * this.pageIndex;
      this.getTableData();
    }
  }

  public moveToPage(pageNumber: number): void {
    this.currentPage = pageNumber;
    this.skip = this.pageSelection[pageNumber - 1].skip;
    this.limit = this.pageSelection[pageNumber - 1].limit;
    if (pageNumber > this.currentPage) {
      this.pageIndex = pageNumber - 1;
    } else if (pageNumber < this.currentPage) {
      this.pageIndex = pageNumber + 1;
    }
    this.getTableData();
  }

  public PageSize(): void {
    this.pageSelection = [];
    this.limit = this.pageSize;
    this.skip = 0;
    this.currentPage = 1;
    this.getTableData();
  }

  private calculateTotalPages(totalData: number, pageSize: number): void {
    this.pageNumberArray = [];
    this.totalPages = totalData / pageSize;
    if (this.totalPages % 1 != 0) {
      this.totalPages = Math.trunc(this.totalPages + 1);
    }
    /* eslint no-var: off */
    for (var i = 1; i <= this.totalPages; i++) {
      const limit = pageSize * i;
      const skip = limit - pageSize;
      this.pageNumberArray.push(i);
      this.pageSelection.push({ skip: skip, limit: limit });
    }
  }

  selectedList2: data[] = [
    { value: 'Select Paid by' },
    { value: 'Paypal' },
    { value: 'Cheque' },
    { value: 'Debit Card' },
  ];


}
