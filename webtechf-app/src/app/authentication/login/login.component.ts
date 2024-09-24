/* eslint-disable @angular-eslint/no-empty-lifecycle-method */
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/auth/auth.service';
import { routes } from 'src/app/shared/routes/routes';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
  public routes = routes;
  public passwordClass = false;
  public ERRROR_MSG = false;
  public error_out = '';
  

  form = new FormGroup({
    email: new FormControl('superadmind@gmail.com', [
      Validators.required,
      Validators.email,
    ]),
    password: new FormControl('Password$123.', [Validators.required]),
  });

  get f() {
    return this.form.controls;
  }

  constructor(public auth: AuthService, public router: Router) {}
  ngOnInit(): void {
    // if (localStorage.getItem('authenticated')) {
    //   localStorage.removeItem('authenticated');
    // }
  }

  loginFormSubmit() {
    if (this.form.valid) {
      this.ERRROR_MSG = false;
      this.auth.login(this.form.value.email ? this.form.value.email: '', this.form.value.password ? this.form.value.password: '')
      .subscribe((res) => {
        console.log(res);
        if (res) {
       
          this.router.navigate([routes.adminDashboard]);
        }else{
          this.ERRROR_MSG = true;
          this.error_out = ' Email o Password Invalido';
        }
      }, (error) => {
        console.log(error);
      });
    }
  }
  togglePassword() {
    this.passwordClass = !this.passwordClass;
  }
}
