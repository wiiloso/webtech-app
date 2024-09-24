import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { AuthService } from 'src/app/shared/auth/auth.service';
import { environment } from 'src/environments/environment.development';
// import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class RolesService {

  constructor(public http: HttpClient, public authService: AuthService) { }

  getRoles() {
    const header = new HttpHeaders({'Authorization': 'Bearer ' + this.authService.token});
    const URL = environment.URL_API + 'roles';
    return this.http.get(URL, {headers: header});
  }

  showRoles(role_id){
    const headers = new HttpHeaders({'Authorization': 'Bearer '+this.authService.token});
    const URL = environment.URL_API+"roles/"+role_id;
    return this.http.get(URL,{headers: headers});
  }

  storeRoles(data) {
    const headers = new HttpHeaders({'Authorization': 'Bearer ' + this.authService.token});
    const URL = environment.URL_API + 'roles';
    return this.http.post(URL, data, {headers: headers});
  }

  editRoles(data, id) {
    const headers = new HttpHeaders({'Authorization': 'Bearer ' + this.authService.token});
    const URL = environment.URL_API + 'roles/' + id;
    return this.http.put(URL, data, {headers: headers});
  }

  deleteRoles(id) {
    const header = new HttpHeaders({'Authorization': 'Bearer ' + this.authService.token});
    const URL = environment.URL_API + 'roles/' + id;
    return this.http.delete(URL, {headers: header});
  }
}
