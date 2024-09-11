<div class="form-group">
    <label for="estado">Estado*</label>
    <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" required>
        <option value="" disabled selected>Selecione o estado</option>
        <option value="AC" {{ old('estado') == 'AC' ? 'selected' : '' }}>Acre</option>
        <option value="AL" {{ old('estado') == 'AL' ? 'selected' : '' }}>Alagoas</option>
        <option value="AP" {{ old('estado') == 'AP' ? 'selected' : '' }}>Amapá</option>
        <option value="AM" {{ old('estado') == 'AM' ? 'selected' : '' }}>Amazonas</option>
        <option value="BA" {{ old('estado') == 'BA' ? 'selected' : '' }}>Bahia</option>
        <option value="CE" {{ old('estado') == 'CE' ? 'selected' : '' }}>Ceará</option>
        <option value="DF" {{ old('estado') == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
        <option value="ES" {{ old('estado') == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
        <option value="GO" {{ old('estado') == 'GO' ? 'selected' : '' }}>Goiás</option>
        <option value="MA" {{ old('estado') == 'MA' ? 'selected' : '' }}>Maranhão</option>
        <option value="MT" {{ old('estado') == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
        <option value="MS" {{ old('estado') == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
        <option value="MG" {{ old('estado') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
        <option value="PA" {{ old('estado') == 'PA' ? 'selected' : '' }}>Pará</option>
        <option value="PB" {{ old('estado') == 'PB' ? 'selected' : '' }}>Paraíba</option>
        <option value="PR" {{ old('estado') == 'PR' ? 'selected' : '' }}>Paraná</option>
        <option value="PE" {{ old('estado') == 'PE' ? 'selected' : '' }}>Pernambuco</option>
        <option value="PI" {{ old('estado') == 'PI' ? 'selected' : '' }}>Piauí</option>
        <option value="RJ" {{ old('estado') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
        <option value="RN" {{ old('estado') == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
        <option value="RS" {{ old('estado') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
        <option value="RO" {{ old('estado') == 'RO' ? 'selected' : '' }}>Rondônia</option>
        <option value="RR" {{ old('estado') == 'RR' ? 'selected' : '' }}>Roraima</option>
        <option value="SC" {{ old('estado') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
        <option value="SP" {{ old('estado') == 'SP' ? 'selected' : '' }}>São Paulo</option>
        <option value="SE" {{ old('estado') == 'SE' ? 'selected' : '' }}>Sergipe</option>
        <option value="TO" {{ old('estado') == 'TO' ? 'selected' : '' }}>Tocantins</option>
    </select>
    @error('estado')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
