/* eslint-disable @typescript-eslint/no-explicit-any */
export interface Categoria {
    id?: number
    status: boolean;
    message: string;
    data: datacategoria;
}

export interface datacategoria {
    cat_id?: number;
    cat_nombre: string;
    cat_cod: string;
    cat_estado: number;
}

export interface apiResultCategoria {
    status: boolean;
    data: Array<any>;
    // totalData: number;
}

