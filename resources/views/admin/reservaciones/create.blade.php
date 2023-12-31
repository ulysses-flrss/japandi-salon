<div id="miModal" class="modal">
    <div class="modal-content">
        <span class="close">x</span>
        <h1 id="bienvenida" >Registrar Reservación</h1>
            <form action="{{route('reservacion.store')}}" id="formularioE" method="POST">
                @csrf
                <div class="form">
                    <div class="cliente">
                        <label for="cliente">Cliente</label>
                        <select name="codCliente" id="">
                            <option value="0" >Seleccione un cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{$cliente['codUsuario']}}">{{$cliente['nombres'] . ' ' . $cliente['apellidos']}}</option>
                            @endforeach
                        </select>
                        @error('codCliente')
                            <small class="error-message" style="text-align: center">*{{$message}}</small>   
                        @enderror
                    </div>
    
                    <div class="fecha-reservacion">
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" id="" required>
                        @error('fecha')
                            <small class="error-message" style="text-align: center">*{{"La fecha debe ser mayor a la actual"}}</small>   
                        @enderror
                    </div>

                    <div class="hora">
                        <label for="hora">Hora:</label>
                        <input type="time" name="hora" id="" max="17:00" min="08:00" required>
                    </div>

                    <div class="justificacion">
                        <label for="justificacion">Justificacion:</label>
                        <input type="text" name="justificacion" id="" required>
                        @error('hora')
                            <small class="error-message" style="text-align: center">*{{$message}}</small>   
                        @enderror
                    </div>
                    <div class="submit">
    
                        <button type="submit">Registrar Reservación</button>
                    </div>
                </div>
                
        </form>
        </div>
  </div>