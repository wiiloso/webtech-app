/* eslint-disable @typescript-eslint/no-explicit-any */
/* eslint-disable @typescript-eslint/no-unused-vars */
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { apiResultProveedor, apiResultProveedores, Proveedor } from 'src/app/shared/interfaces/proveedor.interface';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class ProveedorService {

  private apiURLimage = 'https://api-rutas-434416.uc.r.appspot.com/api/route_image';
  private apiURL = environment.URL_API;

  httpOptions = {
    headers: new HttpHeaders({
      'responseType': 'text',
      'Content-Type': 'application/json',
    })
  };

  constructor(private httpClient: HttpClient) { }

  getImage(data: any): Observable<Blob> {
    return this.httpClient.post(this.apiURLimage, data, { responseType: 'blob' });
  }

  getProveedor = (): Observable<string | Proveedor> => {
    return this.httpClient.get<string | Proveedor>(`${this.apiURL}proveedores/getall`).pipe(
      catchError(this.errorHandler)
    );
  }

  public getProvedorMat(): Observable<apiResultProveedor> {
    return this.httpClient.get<apiResultProveedor>(`${this.apiURL}proveedores/getall`).pipe(
      map((res: apiResultProveedor) => {
        return res;
      })
    );
  }

  public getProvedorMate(): Observable<apiResultProveedores> {
    return this.httpClient.get<apiResultProveedores>(`${this.apiURL}proveedores/getall`).pipe(
      map((res: apiResultProveedores) => {
        return res;
      })
    );
  }
  
  getProveedorId(id: number): Observable<string | Proveedor> {
    return this.httpClient.get<string | Proveedor>(`${this.apiURL}proveedores/getdata/${id}`).pipe(
      catchError(this.errorHandler)
    );
  }

  createProveedor(proveedor): Observable<string> {
    console.log(JSON.stringify(proveedor));
    return this.httpClient.post<string>(`${this.apiURL}proveedores/savedata`, JSON.stringify(proveedor), this.httpOptions).pipe(
      catchError(this.errorHandler)
    );
  }

  deleteProveedor(id: number): Observable<string | Proveedor> {
    return this.httpClient.delete<string | Proveedor>(`${this.apiURL}proveedores/statedata/${id}`).pipe(
      catchError(this.errorHandler)
    );
  }
  
  errorHandler(error) {
    let errorMessage = '';
    if (error.error instanceof ErrorEvent) {
      errorMessage = error.error.message;
    } else {
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    return errorMessage;
  }


}
