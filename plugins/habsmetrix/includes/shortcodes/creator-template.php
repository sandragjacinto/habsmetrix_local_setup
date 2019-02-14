<!-- template for outsider to create post -->

<div id="survey-status"></div>
<form id="survey-form">
    <div class="form-group">
    <label class="title has-text-lime">New statement of the day</label>
        <hr>
        <label class="title has-text-white">Statement</label>
        <textarea type="text" class="form-control" id="ha_surveyQuestion"> </textarea>
        <br>
        <div class="row">
        <div class="col-sm-6">
            <label class="title is-5 is-5 has-text-white">Start Date</label>
            <input type="date" class="form-control" id="ha_startDate">
        </div>
        <div class="col-sm-6">
            <label class="title is-5 has-text-white">End Date</label>
            <input type="date" class="form-control" id="ha_endDate">
        </div>
        </div>
        <hr>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit Survey</button>
    </div>
</form>
