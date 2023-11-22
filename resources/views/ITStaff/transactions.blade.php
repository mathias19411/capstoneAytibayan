@extends('ITStaff.main')

@section('content')
@include('ITStaff.Body.sidebar')
<div style="display: flex;
justify-content: center;
align-items: center;
margin-top: 5rem;">
    <a href="{{ route('itstaff.financialAssistanceTransactionsView') }}" class="add-modal">
    
        Financial Assistances
    
    </a>
    <a href="{{ route('itstaff.loanTransactionsView') }}" class="add-modal">
        
        Loans
    
    </a>
</div>



@endsection
