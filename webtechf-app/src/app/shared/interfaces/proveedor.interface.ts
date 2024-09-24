export interface Proveedor {
    prve_id?: number;
    prve_nombre: string;
    prve_direccion: string;
    prve_telefono: string;
    prve_email: string;
    prve_estado: number;
}

export interface apiResultProveedor {
    status: string;
    data: Proveedor[];
    message: string;
}

export interface apiResultProveedores {
    id?: number
    status: boolean;
    message: string;
    data: Proveedor;
}
