import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { apiResultSubcategoria, Subcategoria } from 'src/app/shared/interfaces/subcategoria';
import { environment } from 'src/environments/environment.development';


@Injectable({
  providedIn: 'root'
})
export class SubcategoriaService {

  private apiURL = environment.URL_API;

  httpOptions = {
    headers: new HttpHeaders({
      'responseType': 'text',
      'Content-Type': 'application/json',
    })
  };

  constructor(private httpClient: HttpClient) { }

  getsubcategoriasByCategoriaId(id: number): Observable<string | apiResultSubcategoria> {
    return this.httpClient
      .get<string | apiResultSubcategoria>(`${this.apiURL}subcategorias/statedatacat/${id}`)
      .pipe(catchError(this.errorHandler));
  }

  public getSubCategoriaMat(): Observable<Subcategoria> {
    return this.httpClient.get<Subcategoria>(`${this.apiURL}subcategorias/getall`).pipe(
      map((res: Subcategoria) => {
        return res;
      })
    );
  }

  public getSubCategoriaMate(): Observable<apiResultSubcategoria> {
    return this.httpClient.get<apiResultSubcategoria>(`${this.apiURL}subcategorias/getall`).pipe(
      map((res: apiResultSubcategoria) => {
        return res;
      })
    );
  }

  getSubcategorias = (): Observable<string | Subcategoria> => {
    return this.httpClient.get<string | Subcategoria>(`${this.apiURL}subcategorias/getall`).pipe(
      catchError(this.errorHandler)
    );
  }

  getSubcategoriasId(id: number): Observable<string | Subcategoria> {
    return this.httpClient.get<string | Subcategoria>(`${this.apiURL}subcategorias/getdata/${id}`).pipe(
      catchError(this.errorHandler)
    );
  }

  createSubcategoria(subcategoria): Observable<string> {
    console.log(JSON.stringify(subcategoria));
    return this.httpClient.post<string>(`${this.apiURL}subcategorias/savedata`, JSON.stringify(subcategoria), this.httpOptions).pipe(
      catchError(this.errorHandler)
    );
  }

  deleteSubcategoria(id: number): Observable<string | Subcategoria> {
    return this.httpClient.delete<string | Subcategoria>(`${this.apiURL}subcategorias/statedata/${id}`).pipe(
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
