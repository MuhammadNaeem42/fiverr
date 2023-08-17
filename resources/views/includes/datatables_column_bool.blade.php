<p>{!!(is_bool($value))?('<span class="light badge badge-'.($value?'success':'danger').'">'.__('lang.'.($value?'active':'not_active')).'</span>'):($value)!!}</p>

