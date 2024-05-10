<!DOCTYPE html>
<html>
<head>
    <title>Multi Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Multi Form</h1>
        <form id="multiForm">
            <div class="form-group">
                <label for="packageName">Nama Paket:</label>
                <input type="text" class="form-control" id="packageName" name="packageName">
            </div>
            <div class="form-group">
                <label for="packageImage">Foto:</label>
                <input type="file" class="form-control-file" id="packageImage" name="packageImage">
            </div>
            <div class="form-group">
                <label>Pilih Nama hari pertama:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="firstDay" id="Day1" value="Senin">
                    <label class="form-check-label" for="Day1">Senin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="firstDay" id="Day2" value="Selasa">
                    <label class="form-check-label" for="Day2">Selasa</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="firstDay" id="Day3" value="Rabu">
                    <label class="form-check-label" for="Day3">Rabu</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="firstDay" id="Day4" value="Kamis">
                    <label class="form-check-label" for="Day4">Kamis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="firstDay" id="Day5" value="Jumat">
                    <label class="form-check-label" for="Day5">Jumat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="firstDay" id="Day6" value="Sabtu">
                    <label class="form-check-label" for="Day6">Sabtu</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="firstDay" id="Day7" value="Minggu">
                    <label class="form-check-label" for="Day7">Minggu</label>
                </div>
                <!-- Add more radio buttons for other days -->
            </div>
            <div id="daysContainer"></div>
            <button type="button" class="btn btn-primary" id="addDayButton">Tambah Hari</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
        var days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        var dayIndex = 0;
        var destinationIndex = 1;

        function addDay() {
            var day = days[dayIndex % days.length];
            var dayContainer = $('<div>').addClass('day-container');
            var dayLabel = $('<h2>').text('Hari ' + day);
            dayContainer.append(dayLabel);
            $('#daysContainer').append(dayContainer);
            dayIndex++;
            addDestination(dayContainer);
        }

        function addDestination(dayContainer) {
            var destinationContainer = $('<div>').addClass('destination-container');
            var destinationLabel = $('<h3>').text('Destinasi ' + destinationIndex);
            destinationContainer.append(destinationLabel);
            dayContainer.append(destinationContainer);
            destinationIndex++;
        }

        $('#addDayButton').click(function() {
            addDay();
        });

        $('input[name="firstDay"]').change(function() {
            dayIndex = days.indexOf($(this).val());
            $('#daysContainer').empty();
            addDay();
        });
    });
    </script>
</body>
</html>
