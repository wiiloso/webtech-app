/* eslint-disable @typescript-eslint/no-unused-vars */
/* eslint-disable @typescript-eslint/no-inferrable-types */
/* eslint-disable @typescript-eslint/no-explicit-any */
import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/shared/data/data.service';
import { RolesService } from '../service/roles.service';
import { ActivatedRoute } from '@angular/router';
import { routes } from 'src/app/shared/routes/routes';

@Component({
  selector: 'app-edit-role-user',
  templateUrl: './edit-role-user.component.html',
  styleUrls: ['./edit-role-user.component.scss'],
})
export class EditRoleUserComponent implements OnInit {
  public routes = routes;
  sideBar = [];
  name = '';
  permissions = [];
  roles_id = 0;
  validaform = false;
  mensageform = '';
  statusclass: number = 0;

  constructor(
    public dataService: DataService,
    public rolservice: RolesService,
    public route: ActivatedRoute
  ) {}

  ngOnInit(): void {
      this.sideBar = this.dataService.sideBar[0].menu;
      this.route.params.subscribe((params) => {
      this.roles_id = params['id'];
    });
    this.showRole();
  }

  showRole() {
    this.rolservice.showRoles(this.roles_id).subscribe((res: any) => {
      this.name = res.name;
      this.permissions = res.permision_pluck;
    });
  }

  addPermisson(subMenu) {
    if (subMenu.permision) {
      const index = this.permissions.findIndex(
        (item) => item == subMenu.permision
      );
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

    const data = { name: this.name, permision: this.permissions };
    this.rolservice.editRoles(data, this.roles_id).subscribe((res: any) => {   
      this.validaStatus(res); 
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
      this.statusclass = 0;
      return;
    }
  }
}
