/* eslint-disable @typescript-eslint/no-explicit-any */
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class RutaService {

  private apiURL = environment.URL_ROBOT + 'route_image';
  httpOptionsrobot = {
    headers: new HttpHeaders({
      'responseType': 'text',
      'Content-Type': 'application/json',
    })
  };

  constructor(private httpClient: HttpClient) { }

  getImage(data: any): Observable<Blob> {
    return this.httpClient.post(this.apiURL, data, { responseType: 'blob' });
  }
}
