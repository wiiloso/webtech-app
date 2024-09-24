/* eslint-disable @typescript-eslint/no-inferrable-types */
/* eslint-disable @typescript-eslint/no-unused-vars */
/* eslint-disable @typescript-eslint/no-explicit-any */
import { Component, OnInit } from '@angular/core';
import { Sort } from '@angular/material/sort';
import { MatTableDataSource } from '@angular/material/table';
import { routes } from 'src/app/shared/routes/routes';
import { RolesService } from '../service/roles.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-list-role-user',
  templateUrl: './list-role-user.component.html',
  styleUrls: ['./list-role-user.component.scss']
})
export class ListRoleUserComponent implements OnInit {

  public routes = routes;
  public rolesList: any = [];
  dataSource!: MatTableDataSource<any>;
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
  public pageSelection: Array<any> = [];
  public totalPages = 0;
  public rolesListGeneral = [];
  public role_selected: any;
  validaform = false;
  mensageform = '';
  statusclass: number = 0;

  constructor(public dataservice: RolesService) { }
  ngOnInit() {
    this.getTableData();
  }
  private getTableData(): void {
    this.rolesList = [];
    this.serialNumberArray = [];

    this.dataservice.getRoles().subscribe((res: any) => {
      this.totalData = res.roles.length;
      this.rolesListGeneral = res.roles;
      this.getTableDataGeneral();
    });
  }

  getTableDataGeneral(): void {
    this.rolesList = [];
    this.serialNumberArray = [];

    this.dataservice.getRoles().subscribe((res: any) => {
      this.totalData = res.roles.length;
      this.rolesListGeneral.map((res: any, index: number) => {
        const serialNumber = index + 1;
        if (index >= this.skip && serialNumber <= this.limit) {
          this.rolesList.push(res);
          this.serialNumberArray.push(serialNumber);
        }
      });
      this.dataSource = new MatTableDataSource<any>(this.rolesList);
      this.calculateTotalPages(this.totalData, this.pageSize);
    });
  }

  selectRole(role: any): void {
    this.selectRole = role;
  }

  deleteRol(id: any): void {
    Swal.fire({
      title: "Esta Seguro de borrar el registro?",
      text: "",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Borrar el registro seleccionado!"
    }).then((result) => {
      if (result.isConfirmed) {
        if (result.value) {
          this.dataservice.deleteRoles(id).subscribe((data) => {
            this.validaStatus(data);
            this.getTableData();
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
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  public searchData(value: any): void {
    this.dataSource.filter = value.trim().toLowerCase();
    this.rolesList = this.dataSource.filteredData;
  }

  public sortData(sort: Sort): void {
    const data = this.rolesList.slice();
    if (!sort.active || sort.direction === '') {
      this.rolesList = data;
    } else {
      this.rolesList = data.sort((a, b) => {
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
      this.getTableDataGeneral();
    } else if (event == 'previous') {
      this.currentPage--;
      this.pageIndex = this.currentPage - 1;
      this.limit -= this.pageSize;
      this.skip = this.pageSize * this.pageIndex;
      this.getTableDataGeneral();
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
    this.getTableDataGeneral();
  }

  public PageSize(): void {
    this.pageSelection = [];
    this.limit = this.pageSize;
    this.skip = 0;
    this.currentPage = 1;
    this.getTableDataGeneral();
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

  validaStatus(res) {
    if (res.message == 500) {
      this.mensageform = res.message_text;
      this.validaform = true;
      this.statusclass = 0;
      return;
    }
    if (res.message == 200) {
      this.mensageform = res.message_text;
      this.validaform = true;
      this.statusclass = 1;
      return;
    }
    if (res.message == 403) {
      this.mensageform = res.message_text;
      this.validaform = true;
      this.statusclass = 0;
      return;
    }
  }
}
