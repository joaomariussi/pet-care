<div class="form-group">
    <label for="schedule_time">Horário*</label>
    <select class="form-control @error('schedule_time') is-invalid @enderror" id="schedule_time" name="schedule_time">
        <option value="" disabled {{ old('schedule_time', $selected ?? '') == '' ? 'selected' : '' }}>Selecione o horário</option>
        <option value="08:00" {{ old('schedule_time', $selected ?? '') == '08:00' ? 'selected' : '' }}>08:00</option>
        <option value="08:30" {{ old('schedule_time', $selected ?? '') == '08:30' ? 'selected' : '' }}>08:30</option>
        <option value="09:00" {{ old('schedule_time', $selected ?? '') == '09:00' ? 'selected' : '' }}>09:00</option>
        <option value="09:30" {{ old('schedule_time', $selected ?? '') == '09:30' ? 'selected' : '' }}>09:30</option>
        <option value="10:00" {{ old('schedule_time', $selected ?? '') == '10:00' ? 'selected' : '' }}>10:00</option>
        <option value="10:30" {{ old('schedule_time', $selected ?? '') == '10:30' ? 'selected' : '' }}>10:30</option>
        <option value="11:00" {{ old('schedule_time', $selected ?? '') == '11:00' ? 'selected' : '' }}>11:00</option>
        <option value="11:30" {{ old('schedule_time', $selected ?? '') == '11:30' ? 'selected' : '' }}>11:30</option>
        <option value="12:00" {{ old('schedule_time', $selected ?? '') == '13:00' ? 'selected' : '' }}>13:00</option>
        <option value="12:30" {{ old('schedule_time', $selected ?? '') == '13:30' ? 'selected' : '' }}>13:30</option>
        <option value="13:00" {{ old('schedule_time', $selected ?? '') == '14:00' ? 'selected' : '' }}>14:00</option>
        <option value="13:30" {{ old('schedule_time', $selected ?? '') == '14:30' ? 'selected' : '' }}>14:30</option>
        <option value="14:00" {{ old('schedule_time', $selected ?? '') == '15:00' ? 'selected' : '' }}>15:00</option>
        <option value="14:30" {{ old('schedule_time', $selected ?? '') == '15:30' ? 'selected' : '' }}>15:30</option>
        <option value="15:00" {{ old('schedule_time', $selected ?? '') == '16:00' ? 'selected' : '' }}>16:00</option>
        <option value="15:30" {{ old('schedule_time', $selected ?? '') == '16:30' ? 'selected' : '' }}>16:30</option>
        <option value="16:00" {{ old('schedule_time', $selected ?? '') == '17:00' ? 'selected' : '' }}>17:00</option>
        <option value="16:30" {{ old('schedule_time', $selected ?? '') == '17:30' ? 'selected' : '' }}>17:30</option>
    </select>
    @error('schedule_time')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>