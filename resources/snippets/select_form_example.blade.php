<select name="attendance_code_id" id="attendance_code_id">
  <option selected disabled>Please select one option</option>
        @foreach($attendancecodes as $key => $attendancecode)

            <option value="{{ $key }}" >
                {{ $attendancecode }}
            </option>

        @endforeach
</select>