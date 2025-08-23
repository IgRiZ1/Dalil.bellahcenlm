@extends('layouts.app')

@section('title', 'Command Center')

@section('content')
<div class="dashboard-container">
    <!-- Header Section -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="dashboard-title gradient-text">
                    <i class="fas fa-satellite-dish me-3 floating"></i>
                    Command Center
                </h1>
                <p class="dashboard-subtitle">Agent Control Interface</p>
            </div>
            <div class="header-right">
                @if($isAdmin)
                    <a href="{{ route('admin.dashboard') }}" class="cyber-btn-admin">
                        <i class="fas fa-shield-alt"></i>
                        <span>ADMIN ACCESS</span>
                        <div class="btn-glow"></div>
                    </a>
                @endif
            </div>
        </div>
    </div></div>

    <!-- Agent Status Panel -->
    <div class="agent-status-panel glass-card">
        <div class="status-header">
            <div class="agent-avatar">
                <div class="avatar-ring">
                    <i class="fas fa-user-astronaut"></i>
                </div>
                <div class="status-indicator online"></div>
            </div>
            <div class="agent-info">
                <h2 class="agent-name">Agent {{ $user->name }}</h2>
                <p class="agent-meta">
                    <span class="agent-id">ID: {{ $user->username }}</span>
                    <span class="separator">•</span>
                    <span class="last-active">Active: {{ now()->format('d M Y') }}</span>
                </p>
                <div class="clearance-level">
                    @if($user->isAdmin())
                        <span class="clearance-badge admin">
                            <i class="fas fa-crown me-1"></i>
                            ADMIN CLEARANCE
                        </span>
                    @else
                        <span class="clearance-badge user">
                            <i class="fas fa-user me-1"></i>
                            STANDARD ACCESS
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="mission-brief">
            @if($user->isAdmin())
                <i class="fas fa-satellite me-2"></i>
                System Administrator privileges active. Full network access granted.
            @else
                <i class="fas fa-rocket me-2"></i>
                Welcome to the digital frontier. Your mission parameters are loading...
            @endif
        </div>
    </div>
    
    <!-- Dashboard Grid -->
    <div class="dashboard-grid">
        <!-- Intel Feed -->
        <div class="intel-panel glass-card">
            <div class="panel-header">
                <h3 class="panel-title">
                    <i class="fas fa-satellite-dish me-2"></i>
                    Intelligence Feed
                </h3>
                <div class="signal-indicator">
                    <div class="signal-dot active"></div>
                    <div class="signal-dot active"></div>
                    <div class="signal-dot active"></div>
                </div>
            </div>
            <div class="intel-content">
                @if($recentNews->count() > 0)
                    <div class="intel-list">
                        @foreach($recentNews as $news)
                            <div class="intel-item">
                                <a href="{{ route('news.show', $news) }}" class="intel-link">
                                    <div class="intel-header">
                                        <span class="intel-classification">CLASSIFIED</span>
                                        <span class="intel-date">{{ $news->published_at->format('d.m.Y') }}</span>
                                    </div>
                                    <h4 class="intel-title">{{ $news->title }}</h4>
                                    <p class="intel-preview">{{ Str::limit($news->content, 80) }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('news.index') }}" class="cyber-link-expand">
                            <i class="fas fa-expand-arrows-alt me-2"></i>
                            ACCESS FULL ARCHIVE
                        </a>
                    </div>
                @else
                    <div class="no-data-message">
                        <i class="fas fa-satellite"></i>
                        <p>No intelligence reports available</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Knowledge Base -->
        <div class="knowledge-panel glass-card">
            <div class="panel-header">
                <h3 class="panel-title">
                    <i class="fas fa-brain me-2"></i>
                    Knowledge Base
                </h3>
                <div class="data-stream">
                    <div class="stream-line"></div>
                </div>
            </div>
            <div class="knowledge-content">
                @if($faqCategories->count() > 0)
                    <div class="knowledge-categories">
                        @foreach($faqCategories as $category)
                            <div class="category-item">
                                <div class="category-header">
                                    <i class="fas fa-folder-open me-2"></i>
                                    <h4>{{ $category->name }}</h4>
                                </div>
                                <p class="category-desc">{{ $category->description }}</p>
                                <div class="category-stats">
                                    <span class="stat-badge">
                                        <i class="fas fa-file-alt me-1"></i>
                                        {{ $category->questions->count() }} entries
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('faq.index') }}" class="cyber-link-expand">
                            <i class="fas fa-database me-2"></i>
                            BROWSE KNOWLEDGE BASE
                        </a>
                    </div>
                @else
                    <div class="no-data-message">
                        <i class="fas fa-brain"></i>
                        <p>Knowledge base initializing...</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@if($isAdmin && $adminStats)
    <!-- Admin Control Matrix -->
    <div class="control-matrix">
        <div class="matrix-header">
            <h3 class="matrix-title gradient-text">
                <i class="fas fa-network-wired me-3"></i>
                System Control Matrix
            </h3>
        </div>
        <div class="matrix-grid">
            <div class="control-node" data-color="blue">
                <div class="node-inner">
                    <i class="fas fa-users"></i>
                    <div class="node-value">{{ $adminStats['totalUsers'] }}</div>
                    <div class="node-label">AGENTS</div>
                </div>
                <div class="node-pulse"></div>
            </div>
            <div class="control-node" data-color="green">
                <div class="node-inner">
                    <i class="fas fa-satellite"></i>
                    <div class="node-value">{{ $adminStats['totalNews'] }}</div>
                    <div class="node-label">INTEL</div>
                </div>
                <div class="node-pulse"></div>
            </div>
            <div class="control-node" data-color="cyan">
                <div class="node-inner">
                    <i class="fas fa-radio"></i>
                    <div class="node-value">{{ $adminStats['totalContacts'] }}</div>
                    <div class="node-label">COMMS</div>
                </div>
                <div class="node-pulse"></div>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="control-node access-node" data-color="orange">
                <div class="node-inner">
                    <i class="fas fa-terminal"></i>
                    <div class="node-value">SYS</div>
                    <div class="node-label">ACCESS</div>
                </div>
                <div class="node-pulse"></div>
            </a>
        </div>
    </div>
@endif
</div>

<style>
.dashboard-container {
    padding: 2rem 0;
    min-height: 100vh;
}

.dashboard-header {
    margin-bottom: 3rem;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
}

.dashboard-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    letter-spacing: 2px;
}

.dashboard-subtitle {
    color: var(--text-secondary);
    font-size: 1.2rem;
    margin-bottom: 0;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.cyber-btn-admin {
    background: linear-gradient(135deg, var(--warning-color), #d97706);
    color: white;
    padding: 1rem 2rem;
    border-radius: var(--radius);
    text-decoration: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-lg);
}

.cyber-btn-admin:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
    color: white;
}

.cyber-btn-admin .btn-glow {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.cyber-btn-admin:hover .btn-glow {
    left: 100%;
}

.agent-status-panel {
    margin-bottom: 3rem;
    padding: 2.5rem;
    border-radius: var(--radius-lg);
    position: relative;
    overflow: hidden;
}

.agent-status-panel::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
    animation: pulse 2s ease-in-out infinite alternate;
}

.status-header {
    display: flex;
    align-items: center;
    gap: 2rem;
    margin-bottom: 2rem;
}

.agent-avatar {
    position: relative;
}

.avatar-ring {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-lg);
    animation: float 3s ease-in-out infinite;
}

.avatar-ring i {
    font-size: 2rem;
    color: white;
}

.status-indicator {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 3px solid var(--card-bg);
}

.status-indicator.online {
    background: var(--success-color);
    box-shadow: 0 0 10px var(--success-color);
}

.agent-name {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.agent-meta {
    color: var(--text-secondary);
    margin-bottom: 1rem;
    font-family: 'Courier New', monospace;
}

.separator {
    margin: 0 0.5rem;
    color: var(--primary-color);
}

.clearance-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: var(--radius);
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.clearance-badge.admin {
    background: linear-gradient(135deg, var(--warning-color), #d97706);
    color: white;
    box-shadow: 0 0 20px rgba(245, 158, 11, 0.3);
}

.clearance-badge.user {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
}

.mission-brief {
    color: var(--text-secondary);
    font-size: 1.1rem;
    line-height: 1.6;
    padding: 1.5rem;
    background: rgba(139, 92, 246, 0.1);
    border-left: 4px solid var(--primary-color);
    border-radius: var(--radius);
}

.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.intel-panel, .knowledge-panel {
    padding: 2rem;
    border-radius: var(--radius-lg);
    position: relative;
}

.panel-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--border-color);
}

.panel-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.signal-indicator {
    display: flex;
    gap: 0.5rem;
}

.signal-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--border-color);
    animation: pulse 1.5s ease-in-out infinite;
}

.signal-dot.active {
    background: var(--success-color);
    box-shadow: 0 0 10px var(--success-color);
}

.signal-dot:nth-child(2) {
    animation-delay: 0.5s;
}

.signal-dot:nth-child(3) {
    animation-delay: 1s;
}

.intel-list {
    space-y: 1rem;
}

.intel-item {
    margin-bottom: 1.5rem;
    padding: 1.5rem;
    background: rgba(139, 92, 246, 0.05);
    border-radius: var(--radius);
    border-left: 3px solid var(--primary-color);
    transition: all 0.3s ease;
}

.intel-item:hover {
    background: rgba(139, 92, 246, 0.1);
    transform: translateX(5px);
}

.intel-link {
    color: inherit;
    text-decoration: none;
    display: block;
}

.intel-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.intel-classification {
    background: var(--danger-color);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: var(--radius);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.intel-date {
    color: var(--text-secondary);
    font-family: 'Courier New', monospace;
    font-size: 0.875rem;
}

.intel-title {
    color: var(--text-primary);
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.intel-preview {
    color: var(--text-secondary);
    line-height: 1.5;
    margin: 0;
}

.category-item {
    margin-bottom: 1.5rem;
    padding: 1.5rem;
    background: rgba(6, 182, 212, 0.05);
    border-radius: var(--radius);
    border-left: 3px solid var(--accent-color);
}

.category-header {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}

.category-header h4 {
    color: var(--text-primary);
    font-weight: 600;
    margin: 0;
    font-size: 1.1rem;
}

.category-desc {
    color: var(--text-secondary);
    margin-bottom: 1rem;
}

.stat-badge {
    display: inline-block;
    background: var(--accent-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius);
    font-size: 0.75rem;
    font-weight: 500;
}

.panel-footer {
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid var(--border-color);
    text-align: center;
}

.cyber-link-expand {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.cyber-link-expand:hover {
    color: var(--secondary-color);
    transform: translateY(-2px);
}

.no-data-message {
    text-align: center;
    padding: 3rem;
    color: var(--text-secondary);
}

.no-data-message i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.control-matrix {
    margin-top: 3rem;
}

.matrix-header {
    text-align: center;
    margin-bottom: 3rem;
}

.matrix-title {
    font-size: 2.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.matrix-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

.control-node {
    position: relative;
    background: var(--card-bg);
    border: 2px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
    overflow: hidden;
}

.control-node:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    color: inherit;
    text-decoration: none;
}

.control-node[data-color="blue"]:hover {
    border-color: #3b82f6;
    box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
}

.control-node[data-color="green"]:hover {
    border-color: #10b981;
    box-shadow: 0 0 30px rgba(16, 185, 129, 0.3);
}

.control-node[data-color="cyan"]:hover {
    border-color: #06b6d4;
    box-shadow: 0 0 30px rgba(6, 182, 212, 0.3);
}

.control-node[data-color="orange"]:hover {
    border-color: #f59e0b;
    box-shadow: 0 0 30px rgba(245, 158, 11, 0.3);
}

.node-inner i {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.node-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    font-family: 'Courier New', monospace;
}

.node-label {
    color: var(--text-secondary);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 0.875rem;
}

.node-pulse {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, var(--primary-color) 0%, transparent 70%);
    transform: translate(-50%, -50%);
    opacity: 0;
    animation: pulse 3s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.5);
    }
    50% {
        opacity: 0.1;
        transform: translate(-50%, -50%) scale(1.2);
    }
}

.data-stream {
    position: relative;
    width: 30px;
    height: 20px;
}

.stream-line {
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    animation: stream 2s linear infinite;
}

@keyframes stream {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

@media (max-width: 768px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .header-content {
        flex-direction: column;
        text-align: center;
    }
    
    .dashboard-title {
        font-size: 2rem;
    }
    
    .status-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .matrix-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .control-node {
        padding: 1.5rem;
    }
}
</style>
@endsection
