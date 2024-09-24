import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { apiResultCategoria, Categoria } from 'src/app/shared/interfaces/categoria.interface';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class CategoriaService {

  // product: any;

  //   constructor(private http: HttpClient) { }

  //   ngOnInit() {
  //       const headers = { 'Authorization': 'Bearer my-token' }
  //       this.http.get<any>('https://testapi.jasonwatmore.com/products/1', { headers })
  //           .subscribe(data => this.product = data);
  //   }
  private apiURL = environment.URL_API;
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'
      // ' Authorizationa': 'Bearer, token'
    })
  };

  constructor(private httpClient: HttpClient) { }

  getCategorias = (): Observable<string | Categoria> => {
    return this.httpClient.get<string | Categoria>(`${this.apiURL}categorias/getall`).pipe(
      catchError(this.errorHandler)
    );
  }

  public getCategoriasMat(): Observable<apiResultCategoria> {
    return this.httpClient.get<apiResultCategoria>(`${this.apiURL}categorias/getall`).pipe(
      map((res: apiResultCategoria) => {
        return res;
      })
    );
  }

  getCategoriasId(id: number): Observable<string | Categoria> {
    return this.httpClient.get<string | Categoria>(`${this.apiURL}categorias/getdata/${id}`).pipe(
      catchError(this.errorHandler)
    );
  }


  createCategoria(categoria): Observable<string> {
    console.log(JSON.stringify(categoria));
    return this.httpClient.post<string>(`${this.apiURL}categorias/savedata`, JSON.stringify(categoria), this.httpOptions).pipe(
      catchError(this.errorHandler)
    );
  }

  deleteCategoria(id: number): Observable<string | Categoria> {
    return this.httpClient.delete<string | Categoria>(`${this.apiURL}categorias/statedata/${id}`).pipe(
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
