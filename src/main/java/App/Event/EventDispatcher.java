package App.Event;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;

public class EventDispatcher implements Dispatcher {
    private Map<String, HashSet<Listener>> listenerMap;

    public EventDispatcher() {
         listenerMap = new HashMap<String, HashSet<Listener>>();
    }

    public void registerListener(String event, Listener listener) {
        if (!listenerMap.containsKey(event)) {
            listenerMap.put(event, new HashSet<Listener>());
        }

        listenerMap.get(event).add(listener);
    }

    public void dispatch(String eventName, EventInterface event) {
        if (!listenerMap.containsKey(eventName)) {
            return;
        }

        for (Listener listener: listenerMap.get(eventName)) {
            listener.execute(event);
        }
    }
}
