<div class="form-group">
    <label for="state">Estado*</label>
    <select class="form-control @error('state') is-invalid @enderror" id="state" name="state" required>
        <option value="" disabled {{ old('state', $selected ?? '') == '' ? 'selected' : '' }}>Selecione o estado</option>
        <option value="AC" {{ old('state', $selected ?? '') == 'AC' ? 'selected' : '' }}>Acre</option>
        <option value="AL" {{ old('state', $selected ?? '') == 'AL' ? 'selected' : '' }}>Alagoas</option>
        <option value="AP" {{ old('state', $selected ?? '') == 'AP' ? 'selected' : '' }}>Amapá</option>
        <option value="AM" {{ old('state', $selected ?? '') == 'AM' ? 'selected' : '' }}>Amazonas</option>
        <option value="BA" {{ old('state', $selected ?? '') == 'BA' ? 'selected' : '' }}>Bahia</option>
        <option value="CE" {{ old('state', $selected ?? '') == 'CE' ? 'selected' : '' }}>Ceará</option>
        <option value="DF" {{ old('state', $selected ?? '') == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
        <option value="ES" {{ old('state', $selected ?? '') == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
        <option value="GO" {{ old('state', $selected ?? '') == 'GO' ? 'selected' : '' }}>Goiás</option>
        <option value="MA" {{ old('state', $selected ?? '') == 'MA' ? 'selected' : '' }}>Maranhão</option>
        <option value="MT" {{ old('state', $selected ?? '') == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
        <option value="MS" {{ old('state', $selected ?? '') == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
        <option value="MG" {{ old('state', $selected ?? '') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
        <option value="PA" {{ old('state', $selected ?? '') == 'PA' ? 'selected' : '' }}>Pará</option>
        <option value="PB" {{ old('state', $selected ?? '') == 'PB' ? 'selected' : '' }}>Paraíba</option>
        <option value="PR" {{ old('state', $selected ?? '') == 'PR' ? 'selected' : '' }}>Paraná</option>
        <option value="PE" {{ old('state', $selected ?? '') == 'PE' ? 'selected' : '' }}>Pernambuco</option>
        <option value="PI" {{ old('state', $selected ?? '') == 'PI' ? 'selected' : '' }}>Piauí</option>
        <option value="RJ" {{ old('state', $selected ?? '') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
        <option value="RN" {{ old('state', $selected ?? '') == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
        <option value="RS" {{ old('state', $selected ?? '') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
        <option value="RO" {{ old('state', $selected ?? '') == 'RO' ? 'selected' : '' }}>Rondônia</option>
        <option value="RR" {{ old('state', $selected ?? '') == 'RR' ? 'selected' : '' }}>Roraima</option>
        <option value="SC" {{ old('state', $selected ?? '') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
        <option value="SP" {{ old('state', $selected ?? '') == 'SP' ? 'selected' : '' }}>São Paulo</option>
        <option value="SE" {{ old('state', $selected ?? '') == 'SE' ? 'selected' : '' }}>Sergipe</option>
        <option value="TO" {{ old('state', $selected ?? '') == 'TO' ? 'selected' : '' }}>Tocantins</option>
    </select>
    @error('state')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
