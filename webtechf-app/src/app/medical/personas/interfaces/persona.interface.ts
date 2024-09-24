export interface Persona {
  status: boolean;
  message: string;
  datapro: datapro;
  id?: number;
}

export interface datapro {
  per_id: number;
  per_nombres: string;
  per_apellidos: string;
  per_direccion: string;
  per_cedula: string;
  per_telefono: string;
  ciu_id: number;
}

export interface dataPersona {
  per_id?: number;
  per_nombres?: string;
  per_apellidos?: string;
  per_direccion?: string;
  per_cedula?: string;
  per_telefono?: string;
  ciu_id?: number;
}

export interface apiResultPersona {
  status: string;
  data: dataPersona[];
  message: string;
}

export interface apiResultFormatoJson {
  status: boolean;
  data: Array<any>;
}
