@extends('layouts.dashboard')

@section('title', 'Messages de Contact - ESIC')

  <link rel="stylesheet" href="{{ asset('css/messages.css') }}">

@section('content')
<div class="messages-container">
  <header class="messages-header">
    <h1><i class="fas fa-envelope-open-text"></i> Messages de Contact</h1>
    <p>Liste des messages reçus via le formulaire de contact</p>
  </header>

  {{-- Filtres --}}
  <form method="GET" action="{{ route('contact.index') }}" class="messages-filters">
    <div class="messages-filter-group">
      <label>Rechercher par nom</label>
      <input type="text" name="name" value="{{ request('name') }}" placeholder="Entrez un nom…">
    </div>
    <div class="messages-filter-group">
      <label>Filtrer par date</label>
      <select name="date">
        <option value="">Toutes les dates</option>
        <option value="today" {{ request('date')=='today'?'selected':'' }}>Aujourd’hui</option>
        <option value="week"  {{ request('date')=='week'?'selected':'' }}>Cette semaine</option>
        <option value="month" {{ request('date')=='month'?'selected':'' }}>Ce mois-ci</option>
      </select>
    </div>
    <button type="submit" class="messages-filter-button">Filtrer</button>
  </form>

  {{-- Tableau --}}
  <div class="messages-table-container">
    <table class="messages-table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Sujet</th>
          <th>Message</th>
          <th>Date</th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody>
        @forelse($messages as $message)
          <tr>
            <td><strong>{{ $message->name }}</strong></td>
            <td><a href="mailto:{{ $message->email }}" class="message-email">{{ $message->email }}</a></td>
            <td>{{ $message->subject }}</td>
            <td class="message-preview" title="{{ $message->message }}">{{ Str::limit($message->message, 50) }}</td>
            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
            <td><span class="messages-badge messages-badge-primary">Nouveau</span></td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="messages-empty-state">
              <i class="fas fa-inbox"></i>
              <h3>Aucun message reçu</h3>
              <p>Aucun message n’a été envoyé via le formulaire de contact.</p>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination --}}
  @if($messages->hasPages())
    <div class="messages-pagination">{{ $messages->links() }}</div>
  @endif
</div>

@endsection

@section('scripts')
<script>
  document.querySelectorAll('.message-preview').forEach(el => {
    el.addEventListener('click', () => {
      alert(el.getAttribute('title'));
    });
  });
</script>
@endsection
