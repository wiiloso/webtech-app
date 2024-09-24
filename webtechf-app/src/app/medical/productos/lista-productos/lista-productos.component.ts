
import { Component, OnInit } from '@angular/core';
import { Sort } from '@angular/material/sort';
import { MatTableDataSource } from '@angular/material/table';
import { DataService } from 'src/app/shared/data/data.service';
import {
  pageSelection,
  // apiResultFormat,
  expenses,
} from 'src/app/shared/models/models';
import { routes } from 'src/app/shared/routes/routes';
import { ProductosService } from '../service/productos.service';
import { apiResultFormato, datapro, Producto } from '../interfaces/producto.interface';
import { ActivatedRoute } from '@angular/router';

// import {MatPaginator} from '@angular/material/paginator';

interface data {
  value: string;
}
@Component({
  selector: 'app-lista-productos',
  templateUrl: './lista-productos.component.html',
  styleUrls: ['./lista-productos.component.scss'],
})
export class ListaProductosComponent implements OnInit {
  public routes = routes;

  public selectedValue!: string;
  public expenses: Array<expenses> = [];
  dataSource!: MatTableDataSource<datapro>;
  productos: Producto[] = [];
  productores: Producto = {} as Producto;
  public datapro: Array<datapro> = [];

  public showFilter = false;
  public searchDataValue = '';
  public lastIndex = 0;
  public pageSize = 10;
  public totalData = 0;
  public shor = 2;
  public skip = 0;
  public limit: number = this.pageSize;
  public pageIndex = 0;
  public serialNumberArray: Array<number> = [];
  public currentPage = 1;
  public pageNumberArray: Array<number> = [];
  public pageSelection: Array<pageSelection> = [];
  public totalPages = 0;
  event: Sort;

  public testpro: Array<datapro> = [];

  displayedColumns: string[] = ['pro_nombre_producto'];

  public expre: Array<datapro> = [];
  dataSources!: MatTableDataSource<datapro>;

  constructor(
    public data: DataService,
    public dataservice: ProductosService,
    public route: ActivatedRoute
  ) { }
  ngOnInit() {
    this.getTableData();
    this.GetProductos();
    // this.getProductotodo();
    // this.GetProductoId(1);
  }

  GetProductos() {
    this.dataservice.getProductos().subscribe((datos: string | Producto) => {
      this.productos = datos as unknown as Producto[];
      this.expre = datos['data'];     
      this.dataSources = new MatTableDataSource<datapro>(this.expre);     
    });
  }

  private getTableData(): void {
    this.dataservice.getProductosMat().subscribe((data: apiResultFormato) => {
      this.datapro = [];
      this.serialNumberArray = [];
      this.totalData = 8;
      this.testpro = [];
      this.totalData = data.data.length;
      data.data.map((res: datapro, index: number) => {
        const serialNumber = index + 1;
        if (index >= this.skip && serialNumber <= this.limit) {
          
        this.datapro.push(res);
        this.serialNumberArray.push(serialNumber);        
        }        
      });

      this.testpro = data.data;
      this.dataSource = new MatTableDataSource<datapro>(this.testpro);
      this.calculateTotalPages(this.totalData, this.pageSize);
    });
  }

  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  public searchData(value: any): void {

    this.dataSource.filter = value.trim().toLowerCase();
    this.testpro = this.dataSource.filteredData;
  }

  public sortData(sort: Sort) {
    const data = this.testpro.slice();
    console.log('short',data);

    if (!sort.active || sort.direction === '') {
      this.testpro = data;
    } else {
      this.testpro = data.sort((a, b) => {
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
  selectedList1: data[] = [
    { value: 'Select Purchase by' },
    { value: 'Bernardo James' },
    { value: 'Galaviz Lalema' },
    { value: 'Tarah Williams' },
  ];
  selectedList2: data[] = [
    { value: 'Select Paid by' },
    { value: 'Paypal' },
    { value: 'Cheque' },
    { value: 'Debit Card' },
  ];
}
