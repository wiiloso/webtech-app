import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';
import { EntradaProductosComponent } from '../entrada-productos/entrada-productos.component';
import { Compra } from 'src/app/shared/interfaces/compra.interface';

@Injectable({
  providedIn: 'root'
})
export class EntradaProductoService {

  private apiURL = environment.URL_API;
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
    }),
  };

  constructor(private httpClient: HttpClient) { }

  getEntradaProductos = (): Observable<string | EntradaProductosComponent> => {
    return this.httpClient
      .get<string | EntradaProductosComponent>(`${this.apiURL}entrada/getall`)
      .pipe(catchError(this.errorHandler));
  };

  public getEntradaMat(): Observable<Compra> {
    return this.httpClient.get<Compra>(`${this.apiURL}entrada/getall`).pipe(
      map((res: Compra) => {
        return res;
      })
    );
  }

  public getKardexMat(): Observable<Compra> {
    return this.httpClient.get<Compra>(`${this.apiURL}entrada/kardex`).pipe(
      map((res: Compra) => {
        return res;
      })
    );
  }

  getEntradaId(id: number): Observable<string | Compra> {
    return this.httpClient
      .get<string | Compra>(
        `${this.apiURL}entradadetalle/getdata/${id}`
      )
      .pipe(catchError(this.errorHandler));
  }

  // public getEntradaProductosMat(): Observable<EntradaProductosComponent> {
  //   return this.httpClient
  //     .get<EntradaProductosComponent>(`${this.apiURL}productos/getall`)
  //     .pipe(
  //       catchError(this.errorHandler)
  //     );
  // }

  getProductoEntradaId(id: number): Observable<string | EntradaProductosComponent> {
    return this.httpClient
      .get<string | EntradaProductosComponent>(`${this.apiURL}productos/getdata/${id}`)
      .pipe(catchError(this.errorHandler));
  }

  createEntrada(entrada): Observable<string> {
    return this.httpClient.post<string>(`${this.apiURL}entrada/savedata`, JSON.stringify(entrada), this.httpOptions).pipe(
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
