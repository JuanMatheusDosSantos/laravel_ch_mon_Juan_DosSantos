@extends("layouts.admin")
@section("title")
    Admin {{Auth::user()->name}}
@endsection
@section("content")
    <button class="btn btn-primary mb-3">New</button>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Firmantes</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="https://via.placeholder.com/35" class="rounded-circle" alt="Imagen">
                            </td>
                            <td>13</td>
                            <td>ppgGuyyyyiyijysdadsdwewewew</td>
                            <td>pp</td>
                            <td>1</td>
                            <td><span class="badge bg-warning text-dark">pendiente</span></td>
                            <td class="btn-action-group">
                                <button class="btn btn-success me-1" title="Editar"><i class="fas fa-check"></i></button>
                                <button class="btn btn-primary me-1" title="Ver"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger" title="Eliminar"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/35" class="rounded-circle" alt="Imagen"></td>
                            <td>14</td>
                            <td>hhh</td>
                            <td>h</td>
                            <td>0</td>
                            <td><span class="badge bg-success">aceptado</span></td>
                            <td class="btn-action-group">
                                <button class="btn btn-success me-1"><i class="fas fa-check"></i></button>
                                <button class="btn btn-primary me-1"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/35" class="rounded-circle" alt="Imagen"></td>
                            <td>15</td>
                            <td>ppgGuyyyyiyijysdadsdwewewew</td>
                            <td>pp</td>
                            <td>0</td>
                            <td><span class="badge bg-warning text-dark">pendiente</span></td>
                            <td class="btn-action-group">
                                <button class="btn btn-success me-1"><i class="fas fa-check"></i></button>
                                <button class="btn btn-primary me-1"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://via.placeholder.com/35" class="rounded-circle" alt="Imagen"></td>
                            <td>16</td>
                            <td>hhh</td>
                            <td>h</td>
                            <td>0</td>
                            <td><span class="badge bg-success">aceptada</span></td>
                            <td class="btn-action-group">
                                <button class="btn btn-success me-1"><i class="fas fa-check"></i></button>
                                <button class="btn btn-primary me-1"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
