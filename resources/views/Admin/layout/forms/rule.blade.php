<label for="rule_id">Rule</label>
<select name="rule_id" class="form-control @error('rule_id') is-invalid @enderror" id="rule_id">
    @foreach ($rules as $rule)
    <option value="{{ $rule->id }}" {{ $rule->id == $value ? 'selected' : '' }}>{{ $rule->name }}</option>
    @endforeach
</select>
@include('Admin.layout.message.error', ['name' => 'rule_id'])