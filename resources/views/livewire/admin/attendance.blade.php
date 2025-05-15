<div>
    {{-- Be like water. --}}
    <div wire:ignore id="calendar"></div>

    {{-- import chart js --}}
    <p>Last 30 Days - <i>Click on the days to see details</i></p>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


    

    <script>
        // Sample daily data (ISO date string → value)
    const dailyData = {!! json_encode($attendances_heatmap)!!};
    //   '2024-12-30': 5, '2025-01-01': 5, '2025-01-02': 13, '2025-01-03': 2, '2025-01-04': 23,
    //   '2025-01-05': 5, '2025-01-06': 23, '2025-01-07': 10, '2025-01-08': 3, '2025-01-09': 5,  /* etc. */

    // Utilities to get ISO week and weekday
    function getISOWeek(d) {
      const date = new Date(d);
      const day = (date.getUTCDay() + 6) % 7;
      date.setUTCDate(date.getUTCDate() - day + 3);
      const firstThursday = new Date(date.getUTCFullYear(),0,4);
      const diff = date - firstThursday;
      return 1 + Math.round(diff / (7 * 24 * 3600 * 1000));
    }
    function getWeekday(d) {
      return (new Date(d).getUTCDay() + 6) % 7; // 0=Mon ... 6=Sun
    }

    // Determine matrix dimensions
    const weeks = {};
    const weeksDatestr = {};
    const text = {};
    for (const dateStr in dailyData) {
      const wk = getISOWeek(dateStr);
      if (!weeks[wk]) weeks[wk] = Array(7).fill(null);
      if (!weeksDatestr[wk]) weeksDatestr[wk] = Array(7).fill(null);
      if (!text[wk]) text[wk] = Array(7).fill(null);
    }
    // Populate
    for (const dateStr in dailyData) {
      const wk = getISOWeek(dateStr);
      const wd = getWeekday(dateStr);
      weeks[wk][wd] = dailyData[dateStr];
      weeksDatestr[wk][wd] = dateStr;
      text[wk][wd] = `
            <b>${dateStr}</b><br>
            Attendants: ${dailyData[dateStr]}` ;
    }

    // Prepare heatmap inputs
    const z = Object.values(weeks);
    const y = Object.keys(weeks).map(w => `Week ${w}`);
    const x = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

    // Plot
    const data = [{
      z, x, y,
      type: 'heatmap',
      customdata: Object.values(weeksDatestr),
      colorscale: 'Greens',
      zmin: 0, // Minimum value for the color scale
      zmax: 5,  // Maximum value for the color scale
      reversescale: true,
      text: Object.values(text),
      hoverinfo: 'text',
      hoverongaps: false
    }];

    console.log(text);

    const layout = {
        title: 'Attendants per week',
        yaxis: { autorange: 'reversed' },
    };

    Plotly.newPlot('calendar', data, layout);

    var calendarDiv = document.getElementById('calendar');

    calendarDiv.on('plotly_click', (eventData) => {
        // eventData.points is an array—even for heatmaps, it's length 1
        let pt = eventData.points[0];
        let url = pt.customdata;
        window.location.href = '/dashboard/time-attendance/' + url;
        //alert('You clicked on ' + '{!! route('dashboard.time-attendance') !!}/' + url);
    });
  </script>
</div>
