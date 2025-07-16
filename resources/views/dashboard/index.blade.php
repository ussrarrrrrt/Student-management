@extends('layouts')

@section('content')

<style>
.bg-violet-students {
    background-image: linear-gradient(135deg, #4012e4ff, #520dd1ff);
    color: #fff;
}

.bg-violet-teachers {
    background-image: linear-gradient(135deg, #3f1a66ff, #3f1a66ff);
    color: #fff;
}

.bg-violet-promos {
    background-image: linear-gradient(135deg, #800d59ff, #800d59ff);
    color: #fff;
}

.bg-violet-courses {
    background-image: linear-gradient(135deg, #e0c3fc, #aa6ec4ff);
    color: #fff;
}
</style>


<div class="row g-4">
    <x-dashboard.card title="Students"
                      :value="$studentsCount"
                      icon="bi-people-fill"
                      class="bg-violet-students" />

    <x-dashboard.card title="Teachers"
                      :value="$teachersCount"
                      icon="bi-person-badge-fill"
                      class="bg-violet-teachers" />

    <x-dashboard.card title="Promotions"
                      :value="$promosCount"
                      icon="bi-award-fill"
                      class="bg-violet-promos" />

    <x-dashboard.card title="Courses"
                      :value="$coursesCount"
                      icon="bi-journal-bookmark-fill"
                      class="bg-violet-courses" />
</div>



    <div class="row mt-5">
        <div class="col-lg-12 mt-3">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Répartition étudiants / enseignants</h5>
                </div>
                <div class="card-body">
                    <canvas id="ratioChart"></canvas>
                </div>
            </div>
        </div>
      
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Derniers étudiants inscrits</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestStudents as $stu)
                            <tr>
                                <td>{{ $stu->id }}</td>
                                <td>{{ $stu->name }}</td>
                                <td>{{ $stu->address }}</td>
                                <td>{{ $stu->mobile }}</td>
                            </tr>
                            @endforeach
                            @unless(count($latestStudents))
                            <tr>
                                <td colspan="4" class="text-center py-4">Aucun enregistrement</td>
                            </tr>
                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('ratioChart');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Students', 'Teachers'],
            datasets: [{
                data: [{{ $studentsCount }}, {{ $teachersCount }}],
                backgroundColor: ['#450563ff', '#700f3cff']
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
</script>
@endpush regarder mon code