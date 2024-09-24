import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { catchError, map, of } from 'rxjs';
// import { BehaviorSubject } from 'rxjs';
// import { routes } from '../routes/routes';
import { config } from 'src/app/config/config';

@Injectable({
  providedIn: 'root',
})

export class AuthService {
  user: string | null;
  token: string | null;

  constructor(private router: Router, public http: HttpClient) {
    this.getLocalStorage();
  }

  public login(email: string, password: string) {
    // localStorage.setItem('authenticated', 'true');
    // this.router.navigate([routes.adminDashboard]);
    const URL: string = config.URL_API + 'auth/login';
    return this.http.post(URL, { email: email, password: password }).pipe(
      map((res) => {
        console.log(res);
        const resultado = this.saveLocalStorage(res);
        return resultado;
      }),
      catchError((error) => {
        console.log(error);
        return of(false);
      })
    );
  }

  getLocalStorage() {
    if (localStorage.getItem('token') && localStorage.getItem('user')) {
      const user_local = localStorage.getItem('user');
      this.user = JSON.parse(user_local ? user_local : '');
      this.token = localStorage.getItem('token');
    } else {
      this.user = null;
      this.token = null;
    }
  }

  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  saveLocalStorage(auth: any) {
    if (auth && auth.access_token) {
      localStorage.setItem('token', auth.access_token);
      localStorage.setItem('user', JSON.stringify(auth.user));
      localStorage.setItem('authenticated', 'true');
      return true;
    } else {
      return false;
    }
  }

  logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    this.router.navigate(['/login']);
    localStorage.removeItem('authenticated');
  }
}
