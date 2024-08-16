<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            Compra
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Menu Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compra</li>
            </ol>
        </nav>
    </div>



    {{-- <div class="card table-responsive mb-2 bg-light">
        <asp:Label ID="lblmessage" runat="server" CssClass="text-danger" Text=""></asp:Label>
        <div class="card-body small">
            <section class="row">
                <div class="col-md-4">
                    <label for="ddl_tipo" class="form-label font-weight-bold">Tipo:</label>
                    <asp:DropDownList ID="ddl_tipo" runat="server" CssClass="form-select w-100 h-50">
                        <asp:ListItem Text="Seleccionar un Tipo..." Value="" Selected="True"></asp:ListItem>
                        <asp:ListItem Text="Venta" Value="Venta"></asp:ListItem>
                        <asp:ListItem Text="Renta" Value="Renta"></asp:ListItem>
                    </asp:DropDownList>
                    <div class="form-text">
                        <asp:Label ID="lblmesaggetipo" runat="server" CssClass="text-danger" Text=""></asp:Label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="ddl_tiempo_contra" class="form-label font-weight-bold">Tiempo de Marketing:</label>
                    <asp:DropDownList ID="ddl_tiempo_contra" runat="server" CssClass="form-select border-start-0 w-100 h-50"></asp:DropDownList>
                    <div class="form-text"></div>
                </div>
                <div id="div_sms" class="col-md-4" runat="server">
                    <label for="txt_proveedor" class="form-label font-weight-bold">Integrador de la Solución:</label>
                    <asp:TextBox ID="txt_proveedor" runat="server" CssClass="form-control"></asp:TextBox>
                    <div class="form-text"></div>
                </div>
            </section>
            <hr />
            <section class="row">
                <div class="col-md-2">
                    <label for="txt_cantidad" class="form-label font-weight-bold">Cantidad:</label>
                    <asp:TextBox ID="txt_cantidad" runat="server" CssClass="form-control" Text="1"></asp:TextBox>
                    <div class="form-text"></div>
                </div>
                <div class="col-md-2">
                    <label for="txt_valoruni" class="form-label font-weight-bold">Valor Unitario $:</label>
                    <asp:TextBox ID="txt_valoruni" runat="server" CssClass="form-control" Text="0.00"></asp:TextBox>
                </div>
                <div class="col-md-2">
                    <label for="txt_vmrc" class="form-label font-weight-bold">Valor MRC $:</label>
                    <asp:TextBox ID="txt_vmrc" runat="server" CssClass="form-control" Text="0.00"></asp:TextBox>
                </div>
                <div class="col-md-2">
                    <label for="txt_mvmrc" class="form-label font-weight-bold">Margen MRC %:</label>
                    <asp:TextBox ID="txt_mvmrc" runat="server" CssClass="form-control" Text="0.00"></asp:TextBox>
                </div>
                <div class="col-md-2">
                    <label for="txt_mrctotal" class="form-label font-weight-bold">MRC Total $:</label>
                    <asp:TextBox ID="txt_mrctotal" runat="server" CssClass="form-control" Text="0.00"></asp:TextBox>
                </div>
            </section>
            <section class="row">
                <div class="col-md-2 offset-md-4">
                    <label for="txt_vnrc" class="form-label font-weight-bold">Valor NRC $:</label>
                    <asp:TextBox ID="txt_vnrc" runat="server" CssClass="form-control" Text="0.00"></asp:TextBox>
                </div>
                <div class="col-md-2">
                    <label for="txt_mvnrc" class="form-label font-weight-bold">Margen NRC %:</label>
                    <asp:TextBox ID="txt_mvnrc" runat="server" CssClass="form-control" Text="0.00"></asp:TextBox>
                </div>
                <div class="col-md-2">
                    <label for="txt_nrctotal" class="form-label font-weight-bold">NRC Total $:</label>
                    <asp:TextBox ID="txt_nrctotal" runat="server" CssClass="form-control" Text="0.00"></asp:TextBox>
                </div>
            </section>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body m-sm-3 m-md-3">
                    <div class="mb-2">
                        <h3>Nueva Compra</h3>
                        <br>
                        <h4>Tipo Pago:</h4>
                    </div>
                    <section class="row">
                        <div class="col-md-4 col-sm-offset-8">
                            <label for="ddl_tipo" class="form-label font-weight-bold">Pago:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            <div class="form-text">

                            </div>
                        </div>
                    </section>
                    <hr class="my-4 text-primary" />
                    <div class="mt-4">
                        <h4>Datos Proveedor:</h4>
                    </div>
                    <section class="row">
                        <div class="col-md-4 col-sm-offset-8">
                            <label for="ddl_tipo" class="form-label font-weight-bold">Proveedor:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            <div class="form-text">
                                {{-- <asp:Label ID="lblmesaggetipo" runat="server" CssClass="text-danger" Text=""></asp:Label> --}}
                            </div>
                        </div>
                    </section>
                    <section class="row">
                        <div class="col-md-4">

                            <label for="exampleFormControlInput1" class="form-label">RUC:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="RUC">
                          
                            <div class="form-text">
                                {{-- <asp:Label ID="lblmesaggetipo" runat="server" CssClass="text-danger" Text=""></asp:Label> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Dirección">
                            <div class="form-text"></div>
                        </div>
                        <div id="div_sms" class="col-md-4" runat="server">
                            <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telefono">
                            <div class="form-text"></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body m-sm-3 m-md-3">
                    <div class="mb-4">
                        <h4>Agregar Producto:</h4>
                    </div>
                    <section class="row">
                        <div class="col-md-4">
                            <label for="ddl_tipo" class="form-label font-weight-bold">Categoria productos:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="ddl_tipo" class="form-label font-weight-bold">Sub-categoria productos:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            <div class="form-text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="ddl_tipo" class="form-label font-weight-bold">Productos:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            <div class="form-text">
                            </div>
                        </div>
                    </section>

                    <section class="row mt-3">
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Precio:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telefono">
                            <div class="form-text"></div>
                        </div>
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Stock:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telefono">
                        </div>
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Unidad de medida:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telefono">
                        </div>
                        <div class="col-md-2">
                            <label for="exampleFormControlInput1" class="form-label">Cantidad:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telefono">
                        </div>
                        <div class="col-md-2">
                            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success btn-lg me-md-2 mt-4" type="button">Agregar +</button>
                     
                              </div> --}}
                            {{-- <button class="btn btn-success mt-4">Agregar<i class="align-middle fas fa-fw fa-solid fa-plus"></i></button> --}}
                        </div>
                    </section>
                    <section class="row mt-3">
                       
                        <div class="col-md-2 col offset-md-8">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success btn-lg me-md-2 mt-4" type="button">Agregar +</button>
                     
                              </div>
                            {{-- <button class="btn btn-success mt-4">Agregar<i class="align-middle fas fa-fw fa-solid fa-plus"></i></button> --}}
                        </div>
                    </section>
                    <hr class="my-4 text-primary" />


                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="text-muted">Client</div>
                            <strong>
                                Linda Miller
                            </strong>
                            <p>
                                4183 Forest Avenue <br>
                                New York City <br>
                                10011 <br>
                                USA <br>
                                <a href="#">
                                    lida.miller@gmail.com
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="text-muted">Payment To</div>
                            <strong>
                                Spark LLC
                            </strong>
                            <p>
                                354 Roy Alley <br>
                                Denver <br>
                                80202 <br>
                                USA <br>
                                <a href="#">
                                    info@spark.com
                                </a>
                            </p>
                        </div>
                    </div>

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th class="text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Spark Theme Customization</td>
                                <td>2</td>
                                <td class="text-end">$150.00</td>
                            </tr>
                            <tr>
                                <td>Monthly Subscription </td>
                                <td>3</td>
                                <td class="text-end">$25.00</td>
                            </tr>
                            <tr>
                                <td>Additional Service</td>
                                <td>1</td>
                                <td class="text-end">$100.00</td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Subtotal </th>
                                <th class="text-end">$275.00</th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Shipping </th>
                                <th class="text-end">$8.00</th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Discount </th>
                                <th class="text-end">5%</th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Total </th>
                                <th class="text-end">$268.85</th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <p class="text-sm">
                            <strong>Extra note:</strong>
                            Please send all items at the same time to the shipping address.
                            Thanks in advance.
                        </p>

                        <a href="#" class="btn btn-primary">
                            Print this receipt
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>