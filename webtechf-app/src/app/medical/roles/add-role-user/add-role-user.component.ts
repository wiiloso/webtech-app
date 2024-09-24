/* eslint-disable @typescript-eslint/no-inferrable-types */
/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable @typescript-eslint/no-unused-vars */
import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/shared/data/data.service';
import { RolesService } from '../service/roles.service';
import { routes } from 'src/app/shared/routes/routes';

@Component({
  selector: 'app-add-role-user',
  templateUrl: './add-role-user.component.html',
  styleUrls: ['./add-role-user.component.scss']
})

export class AddRoleUserComponent implements OnInit {
  public routes = routes;
  sideBar = [];
  name = '';
  permissions = [];
  validaform = false;
  mensageform = '';
  statusclass: number = 0;

  constructor(
     public dataService: DataService,
     public rolservice: RolesService
    ) {
  }

  ngOnInit(): void {
    this.sideBar = this.dataService.sideBar[0].menu;
  }

  addPermisson(subMenu) {
    if (subMenu.permision) {
      const index = this.permissions.findIndex((item) => item == subMenu.permision);
      if (index !== -1) {
        this.permissions.splice(index, 1);
      } else {
        this.permissions.push(subMenu.permision);
      }
    }
  }

  GuardarRol() {
    this.validaform = false;
    if (!this.name || this.permissions.length == 0) {
      this.validaform = true;
      this.statusclass = 0;
      this.mensageform = 'Todos los campos son obligatorios !!';
      return;
    }
  
    const data =  { name: this.name, permision: this.permissions }
    this.rolservice.storeRoles(data).subscribe((res: any) => {  
      this.name = '';
      this.permissions = [];
      this.validaStatus(res);
      const sideBarclean = this.sideBar;
      this.sideBar = [];
      setTimeout(() => {
        this.sideBar = sideBarclean;
      }, 50);
    });
  }

  validaStatus(res){
    if(res.message == 500){
      this.mensageform = res.message_text;
      this.validaform = true;
      this.statusclass = 0;
      return;
    }
    if(res.message == 200){
      this.mensageform = res.message_text;
      this.validaform = true;
      this.statusclass = 1;
      return;
    }
    if(res.message == 403){
      this.mensageform = res.message_text;
      this.validaform = true;
      this.statusclass = 3;
      return;
    }
  }
}
