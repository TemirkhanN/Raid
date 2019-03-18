package Overseer;

import App.Event.Dispatcher;
import Overseer.Event.NewSubjectEvent;

import java.util.HashSet;
import java.util.Set;

public class Overseer {
    private Dispatcher eventDispatcher;

    private Set<Subject> subjects = new HashSet<Subject>();

    public Overseer(Dispatcher eventDispatcher) {
        this.eventDispatcher = eventDispatcher;
    }

    public void observe(Subject subject) {
        if (subjects.contains(subject)) {
            return;
        }

        eventDispatcher.dispatch("new_subject_in_game", new NewSubjectEvent(subject));

        // TODO Some observation strategies iduhno
        subjects.add(subject);
    }
}
