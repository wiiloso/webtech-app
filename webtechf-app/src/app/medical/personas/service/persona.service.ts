/* eslint-disable @typescript-eslint/no-explicit-any */
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment.development';
import { catchError, map } from 'rxjs';
import {} from '../interfaces/persona.interface';
import { Observable } from 'rxjs';
import {
  apiResultPersona,
  apiResultFormatoJson,
  Persona,
} from '../../personas/interfaces/persona.interface';

@Injectable({
  providedIn: 'root',
})
export class PersonaService {
  private apiURL = environment.URL_API;
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
    }),
  };

  constructor(private httpClient: HttpClient) {}

  buscarCliente(buscar_cedula: string): Observable<apiResultFormatoJson> {
    console.log(buscar_cedula);
    console.log(this.apiURL + `personas/getPersona/${buscar_cedula}`);
    return this.httpClient.get<apiResultFormatoJson>(
      this.apiURL + `personas/getPersona/${buscar_cedula}`
    );
  }
}
